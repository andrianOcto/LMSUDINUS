<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserLog;
use App\User;
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

      $userCourses = User::find($user->id)->courses;

      return view('page/dosen/home/home')->with("userCourses",$userCourses);
  }

  public function outline(){
    $user   = Auth::user();

    $userLog = new UserLog;
    $userLog->user_id = $user->id;
    $userLog->activity= $user->name." Logged in as dosen";
    $userLog->save();

    $userCourses = User::find($user->id)->courses;

    return view('page/dosen/outline/home')->with("userCourses",$userCourses);
  }

  public function materi(){
    $user   = Auth::user();

    $userLog = new UserLog;
    $userLog->user_id = $user->id;
    $userLog->activity= $user->name." Logged in as dosen";
    $userLog->save();

    $userCourses = User::find($user->id)->courses;

    return view('page/dosen/outline/materi')->with("userCourses",$userCourses);
  }
}
