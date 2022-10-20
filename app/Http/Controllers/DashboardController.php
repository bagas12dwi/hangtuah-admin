<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = DB::table('users')
            ->count('users.id');
        $jmlGuru = DB::table('pegawais')->count('pegawais.id');
        $jmlBerita = DB::table('beritas')->count('beritas.id');
        $jmlTesti = DB::table('testimonials')->count('testimonials.id');


        return view('dashboard', [
            'title' => 'Dashboard'
        ])->with('jmlUser', $user)
            ->with('jmlGuru', $jmlGuru)
            ->with('jmlBerita', $jmlBerita)
            ->with('jmlTesti', $jmlTesti);
    }
}
