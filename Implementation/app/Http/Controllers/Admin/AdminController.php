<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserLog;
use Auth;

class AdminController extends Controller
{
  public function index()
  {
      $user   = Auth::user();

      $userLog = new UserLog;
      $userLog->user_id = $user->id;
      $userLog->activity= $user->name." Logged in as admin";
      $userLog->save();
      
      return view('page/admin/home/home');
  }
}
