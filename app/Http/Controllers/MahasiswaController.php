<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function detail($uuid)
    {
        $mahasiswa = User::with('oneProfile')->where('uuid', $uuid)->first();

        abort_if(! $mahasiswa, 404);

        return view('detail', compact('mahasiswa'));
    }
}
