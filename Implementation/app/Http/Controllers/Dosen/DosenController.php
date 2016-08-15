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
use DB;
use Storage;
use File;

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

  public function materi($id,$type,$section){
    $user   = Auth::user();

    $userLog = new UserLog;
    $userLog->user_id = $user->id;
    $userLog->activity= $user->name." Logged in as dosen";
    $userLog->save();

    $userCourses = User::find($user->id)->courses;
    $course      = Course::find($id);

    return view('page/dosen/outline/materi')->with("userCourses",$userCourses)
                                            ->with("course",$course)
                                            ->with("type",$type)
                                            ->with("section",$section);
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

    return redirect('/dosen/outline/'.$section->id)->with("userCourses",$userCourses)
                                          ->with("course",$course)
                                          ->with("sections",$sectionCourse);
  }

  public function createMateri(Request $request,$id){

    $type = $request->input('type');
    $user   = Auth::user();

    $userLog = new UserLog;
    $userLog->user_id = $user->id;
    $userLog->activity= $user->name." Create materi";
    $userLog->save();

    DB::beginTransaction();
    $content     = new Content;
    $content->section_id     = $request->input('sectionID');;
    $content->post_id        = 0;
    $content->title          = $request->input('judul');
    $content->description    = $request->input('deskripsi');
    $content->available_from     = $request->input('dateFrom');
    $content->available_until     = $request->input('dateUntil');

    $content->save();

    $materi   = new Materi;
    $materi->content_id = 0;

    //upload materi text
    if($type == 0)
    {
      $materi->type = "0";
    }
    //upload materi file
    if($type == 1){

      $file = $request->file('fileMateri');
      $extension = $file->getClientOriginalExtension();
      Storage::disk('local')->put($file->getClientOriginalName().'.'.$extension,  File::get($file));
      $materi->filename   = $file->getFilename().'.'.$extension;
      $materi->type = "1";
    }
    //upload url
    else if($type==2){
      $materi->url   = $request->input('url');
      $materi->type = "2";
    }

    $materi->save();

    $userCourses = User::find($user->id)->courses;

    $course         = Course::find($id);
    $sectionCourse  = Course::find($id)->sections;

    DB::commit();
    return redirect('page/dosen/outline/home')->with("userCourses",$userCourses)
                                          ->with("course",$course)
                                          ->with("sections",$sectionCourse);
  }

}
