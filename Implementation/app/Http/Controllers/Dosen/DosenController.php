<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserLog;
use App\User;
use App\Course;
use App\Section;
use App\Content;
use App\Materi;
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

  public function createMateri(Request $request,$id){

    $user   = Auth::user();

    $userLog = new UserLog;
    $userLog->user_id = $user->id;
    $userLog->activity= $user->name." Create materi";
    $userLog->save();

    $content     = new Content;
    $content->section_id     = 0;
    $content->post_id        = 0;
    $content->title          = $request->input('judul');
    $content->description    = $request->input('deskripsi');
    $content->available_from     = $request->input('dateFrom');
    $content->available_until     = $request->input('dateUntil');

    $content->save();

    $materi   = new Materi;
    $materi->content_id = 0;
    $materi->filename   = $request->input('fileMateri');
    $materi->url   = $request->input('url');

    $materi->save();

    $userCourses = User::find($user->id)->courses;


    $course         = Course::find($id);
    $sectionCourse  = Course::find($id)->sections;


    return view('page/dosen/outline/home')->with("userCourses",$userCourses)
                                          ->with("course",$course)
                                          ->with("sections",$sectionCourse);
  }

}
