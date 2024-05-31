<?php

namespace App\Http\Controllers;

use App\Models\FileTemp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Handle File Upload Temp
     * 
     * menghandle file upload sementara/temp
     */
    public function uploadTemp(Request $request)
    {
        if($request->has('file')){
            $folder = rand();

            $file = \Illuminate\Support\Str::random() . "-" . $request->file('file')->getClientOriginalName();

            $temp = FileTemp::create([
                "folder" => $folder,
                "file" => $file
            ]);

            // pastikan folder temp ada
            Storage::putFileAs("public/temp/$folder", $request->file('file'), $file);

            return $folder;
        }

        Log::debug("data tidak masuk");
        return '';
    }

    public function revertTemp(Request $request){
        Log::debug("data yang masuk", [$request->getContent()]);

        $temp = FileTemp::where('folder', $request->getContent())->first();
        Storage::deleteDirectory("public/temp/" . $request->getContent());
        Log::debug("directory dihapus");

        $temp->delete();
        Log::debug("database dihapus");

        return true;
    }
}
