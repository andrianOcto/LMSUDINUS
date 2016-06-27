<?php

namespace App\Http\Controllers\Admin;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Course;
use App\User;

class EnrollController extends Controller
{
  public function index()
  {
    $course = Course::all();
    return view('page/admin/enroll/home')->with('courses',$course);
  }

  public function readUser($courseId,$roleId){

    $courses  = Course::find($courseId)->users()->get();
    return Datatables::of($courses)->make(true);
  }
}
