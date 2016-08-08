<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserLog;
use App\User;
use App\Course;
use App\Section;
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

  public function outline($id){
    $user   = Auth::user();

    $userLog = new UserLog;
    $userLog->user_id = $user->id;
    $userLog->activity= $user->name." Logged in as dosen";
    $userLog->save();

    $userCourses = User::find($user->id)->courses;
    $course      = Course::find($id);
    $section     = Course::find($id)->sections;

    return view('page/dosen/outline/home')->with("userCourses",$userCourses)
                                          ->with("course",$course)
                                          ->with("sections",$section);
  }

  public function materi($id){
    $user   = Auth::user();

    $userLog = new UserLog;
    $userLog->user_id = $user->id;
    $userLog->activity= $user->name." Logged in as dosen";
    $userLog->save();

    $userCourses = User::find($user->id)->courses;
    $course      = Course::find($id);

    return view('page/dosen/outline/materi')->with("userCourses",$userCourses)
                                            ->with("course",$course);
  }

  public function createSection(Request $request,$id){

    $user   = Auth::user();

    $userLog = new UserLog;
    $userLog->user_id = $user->id;
    $userLog->activity= $user->name." Logged in as dosen";
    $userLog->save();

    $userCourses = User::find($user->id)->courses;

    $title        = $request->input('judul');
    $description  = $request->input('description');

    $course         = Course::find($id);
    $sectionCourse  = Course::find($id)->sections;

    $section     = new Section;
    $section->title = $title;
    $section->description = $description;
    $section->status = "1";

    $course->sections()->save($section);

    return view('page/dosen/outline/home')->with("userCourses",$userCourses)
                                          ->with("course",$course)
                                          ->with("sections",$sectionCourse);
  }
}
