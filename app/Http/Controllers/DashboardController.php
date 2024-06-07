<?php

namespace App\Http\Controllers;

use App\Models\FileTemp;
use App\Models\User;
use App\Models\UserFile;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $userProfile = UserProfile::where('user_id', auth()->user()->id)->first();

        return view('pages.dashboard.index', compact('userProfile'));
    }

    public function userFilePost(Request $request, \App\Services\Interfaces\ClassificationService $classificationService, \App\Services\Interfaces\ScoreService $scoreService)
    {
        $request->validate([
            'file' => 'required',
            'type' => 'required'
        ]);

        $filePath = str_replace('"', '', $request->file);

        $prediksi = collect($classificationService->classificationDokumen($filePath))->toArray();

        $probabilitas = collect($prediksi['data']->probabilitas)->toArray();

        $labels = $classificationService->labelCalculate($probabilitas);


        try {

            \Illuminate\Support\Facades\DB::beginTransaction();

            $userFile = UserFile::create([
                "user_id" => auth()->user()->id,
                "path" => $filePath,
                "file" => substr($filePath, 8),
                "scores" => $probabilitas,
                "labels" => $labels,
                "type" => $request->type
            ]);

            // sync score to profile
            $scoreService->syncroniceScoreUser();

            \Illuminate\Support\Facades\DB::commit();

            Log::info("berhasil menambahkan file baru", [
                "data" => $userFile,
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
            } catch (\Throwable $th) {
                Log::error("transkip gagal ditambahkan", [
                    "class" => get_class(),
                    "user" => auth()->user(),
                    "massage" => $th->getMessage()
                ]);
                return back()->with('error', 'gagal menambahkan transkip nilai');
        }
    }

    // test route
    public function test(\App\Services\Interfaces\ScoreService $scoreService)
    {

        // dd($scoreService->scoresTranskipUser());

        // $scoreService->syncroniceScoreUser();

    }
}
