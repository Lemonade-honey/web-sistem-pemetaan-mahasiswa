<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProject;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function detail($uuid)
    {
        $mahasiswa = User::with('oneProfile')->where('uuid', $uuid)->first();

        $userProject = UserProject::where('user_id', auth()->user()->id)->first();
        abort_if(! $mahasiswa, 404);

        return view('detail', compact('mahasiswa', 'userProject'));
    }
}
