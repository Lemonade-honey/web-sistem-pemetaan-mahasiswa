<?php

namespace App\Http\Controllers;

use App\Models\FileTemp;
use App\Models\User;
use App\Models\UserFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $userFiles = UserFile::where('id', auth()->user()->id)->paginate();

        return view('pages.dashboard.index', compact('userFiles'));
    }

    public function userFilePost(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'type' => 'required'
        ]);

        $temp = FileTemp::where('folder', $request->file)->first();

        abort_if(!$temp, 408);

        try {
            $move = Storage::copy("public/temp/" . $temp->folder. "/" . $temp->file, "public/$request->type/" . $temp->file);
            
            if($move){
                Storage::deleteDirectory("public/temp/" . $temp->folder);

                $temp->delete();
            }

            $userFile = UserFile::create([
                "user_id" => auth()->user()->id,
                "path" => "$request->type/" . $temp->file,
                "file" => $temp->file,
                "type" => $request->type
            ]);

            Log::info("berhasil menambahkan file baru", [
                "data" => $userFile,
                "user" => auth()->user()
            ]);

            return back()->with('success', 'berhasil menambahkan data baru');

        } catch (\Throwable $th) {
            Log::error("file baru gagal ditambahkan", [
                "class" => get_class(),
                "user" => auth()->user()
            ]);

            return back()->withErrors(['gagal dalam menambahkan data baru. coba lagi nanti !', $th->getCode()]);
        }
    }
}
