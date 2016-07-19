<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserLog;
use Auth;

class DosenController extends Controller
{
  public function index()
  {
      $user   = Auth::user();

      $userLog = new UserLog;
      $userLog->user_id = $user->id;
      $userLog->activity= $user->name." Logged in as dosen";
      $userLog->save();

      return view('page/dosen/home/home');
  }
}
