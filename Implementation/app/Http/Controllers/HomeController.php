<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role === 0)
        {
            return redirect('/admin');
        }
        else if($user->role === 1){
            return redirect('/dosen');
        }
        else if($user->role === 2){
            return redirect('/mahasiswa');
        }

    }
}
