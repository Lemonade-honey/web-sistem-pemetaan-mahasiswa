<?php

namespace App\Http\Controllers;

use App\Models\UserFile;
use App\Models\UserProfile;
use App\Models\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $userProfile = UserProfile::with('oneUser')
        ->where('user_id', auth()->user()->id)->first();

        $userProject = UserProject::where('user_id', auth()->user()->id)->first();

        return view('pages.dashboard.index', compact('userProfile', 'userProject'));
    }

    public function userFilePost(Request $request, \App\Services\Interfaces\ClassificationService $classificationService, \App\Services\Interfaces\ScoreService $scoreService)
    {
        $request->validate([
            'file' => 'required',
            'title' => ['required', 'max:255'],
            'type' => 'required',
            'desc' => 'nullable'
        ]);

        $filePath = str_replace('"', '', $request->file);

        $prediksi = collect($classificationService->classificationDokumen($filePath))->toArray();

        $probabilitas = $prediksi['classification_scores']['probabilitas'];

        $labels = $classificationService->labelCalculate($probabilitas, 30);

        try {

            \Illuminate\Support\Facades\DB::beginTransaction();

            if($request->input('type') == 'skripsi')
            {
                $userProject = UserProject::where('user_id', auth()->user()->id)->first();
                if ($userProject)
                {
                    $userProject->title = $request->input('title');
                    $userProject->path = $filePath;
                    $userProject->file = substr($filePath, 8);
                    $userProject->scores = $probabilitas;
                    $userProject->labels = $labels;
                    $userProject->ringkasan = strlen($request->input('desc')) > 10 ? $request->desc : $prediksi['ringkasan'];
                    $userProject->akurasi = $prediksi['classification_scores']['akurasi_score'];
                    $userProject->save();
                } 
                
                else
                {
                    UserProject::create([
                        "user_id" => auth()->user()->id,
                        "title" => $request->input('title'),
                        "path" => $filePath,
                        "file" => substr($filePath, 8),
                        "scores" => $probabilitas,
                        "labels" => $labels,
                        "ringkasan" => strlen($request->input('desc')) > 10 ? $request->desc : $prediksi['ringkasan'],
                        "akurasi" => $prediksi['classification_scores']['akurasi_score'],
                    ]);
                }
            } 
            
            else
            {
                UserFile::create([
                    "user_id" => auth()->user()->id,
                    "path" => $filePath,
                    "file" => substr($filePath, 8),
                    "scores" => $probabilitas,
                    "labels" => $labels,
                    "ringkasan" => strlen($request->input('desc')) > 10 ? $request->desc : $prediksi['ringkasan'],
                    "akurasi" => $prediksi['classification_scores']['akurasi_score'],
                    "type" => $request->type
                ]);
            }

            // sync score to profile
            $scoreService->syncroniceScoreUser();

            \Illuminate\Support\Facades\DB::commit();

            Log::info("berhasil menambahkan file baru", [
                "user" => auth()->user()
            ]);

            return back()->with('success', 'berhasil menambahkan data baru');

        } catch (\Throwable $th) {

            \Illuminate\Support\Facades\DB::rollBack();

            Log::error("file baru gagal ditambahkan", [
                "class" => get_class(),
                "user" => auth()->user(),
                "massage" => $th->getMessage()
            ]);

            return back()->withErrors(['gagal dalam menambahkan data baru. coba lagi nanti !', $th->getCode()]);
        }
    }

    public function userTranskipNilaiPost(Request $request, \App\Services\Interfaces\ClassificationService $classificationService, \App\Services\Interfaces\ScoreService $scoreService)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $filePath = str_replace('"', '', $request->file);
        
        try {
            $transkipScores = collect($classificationService->transkipNilaiScore($filePath))->toArray();

            $transkipLabel = collect($transkipScores['transkip-label-score'])->toArray();
            $transkipPoint = collect($transkipScores['akademik-scores'])->toArray();
            $transkipBadge = collect($transkipScores['badge'])->toArray();

            \Illuminate\Support\Facades\DB::beginTransaction();

            $userProfile = UserProfile::where('user_id', auth()->user()->id)->first();
            $userProfile->transkip_scores = $transkipLabel;
            $userProfile->path_transkip = $filePath;
            $userProfile->transkip_point = $transkipPoint[0];
            $userProfile->transkip_badge = $transkipBadge;
            $userProfile->save();

            // sync score to profile
            $scoreService->syncroniceScoreUser();

            \Illuminate\Support\Facades\DB::commit();

            return back()->with('success', 'berhasil menambahkan transkip nilai');
            } 
            catch (\Throwable $th) {
                \Illuminate\Support\Facades\DB::rollBack();
                Log::error("transkip gagal ditambahkan", [
                    "class" => get_class(),
                    "user" => auth()->user(),
                    "massage" => $th->getMessage()
                ]);
                return back()->with('error', 'gagal menambahkan transkip nilai');
        }
    }

    public function massagePost(Request $request)
    {
        $request->validate([
            'massage' => ['nullable', 'max:500']
        ], [
            'massage.max' => 'panjang karakter tidak boleh lebih dari 500'
        ]);

        try {
            $userProfile = UserProfile::where('user_id', auth()->user()->id)->first();
            
            $userProfile->massage = $request->massage;

            $userProfile->save();

            return back()->with('success', 'berhasil mengubah data');

        } catch (\Throwable $th) {
            Log::error('gagal mengubah massage', [
                'class' => get_class(),
                'massage' => $th->getMessage()
            ]);

            return back()->with('error', 'gagal mengubah data');
        }
    }

    public function deleteFile($id, \App\Services\Interfaces\ClassificationService $classificationService, \App\Services\Interfaces\ScoreService $scoreService)
    {
        $userFile = UserFile::findOrFail($id);
        
        try{
            $filePath = substr($userFile->path, 0, 7);

            if ($classificationService->deleteFile($filePath) == 200)
            {
                \Illuminate\Support\Facades\DB::beginTransaction();
                $userFile->delete();

                $scoreService->syncroniceScoreUser();

                \Illuminate\Support\Facades\DB::commit();
                return back()->with('success', 'file berhasil di hapus');
            }

            return back()->with('error', 'file gagal dihapus');
        } catch(\Throwable $th)
        {
            \Illuminate\Support\Facades\DB::rollBack();
            return back()->with('error', 'server errors');
        }
    }

    // test route
    public function test(\App\Services\Interfaces\ScoreService $scoreService)
    {

        // dd($scoreService->scoresTranskipUser());

        // $scoreService->syncroniceScoreUser();

    }
}
