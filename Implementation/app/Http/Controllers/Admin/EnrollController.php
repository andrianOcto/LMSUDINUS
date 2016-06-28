<?php

namespace App\Http\Controllers\Admin;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Course;
use App\User;
use DB;

class EnrollController extends Controller
{
  public function index()
  {
    $course = Course::all();
    return view('page/admin/enroll/home')->with('courses',$course);
  }

  public function readUser(Request $request,$role=-99,$course=-99){
    $courseId = DB::table('user_course')->where('course_id', $course)->lists('user_id');
    if($role == 0) //get all user
    $users = DB::table('users')
                  ->whereIn('id', $courseId);
    else if($role == 1)//get lecturere users
    $users = DB::table('users')
                  ->where('role','lecturer')
                  ->whereIn('id', $courseId);
    else if($role == 2)
    $users = DB::table('users')
                  ->where('role','student')
                  ->whereIn('id', $courseId);
    return Datatables::of($users)->make(true);
  }

  public function addUserCourse(Request $request){
    $returnData       = array();
      $response         = "OK";
      $statusCode       = 200;
      $result           = null;
      $message          = "Add user success.";
      $isError          = FALSE;
      $missingParams    = null;
      $errorType        = "username";

      $idUser           = ($request->input('idUser') != null) ? $request->input('idUser'):null;
      $idCourse         = ($request->input('idCourse') != null) ? $request->input('idCourse'):null;

      if(!isset($idUser)){
          $missingParams[] = "idUser";
      }
      if(!isset($idCourse)){
          $missingParams[] = "idCourse";
      }

      if(isset($missingParams)){
              $isError = TRUE;
              $response = "FAILED";
              $statusCode = 400;
              $message = "Missing parameters : {".implode(', ', $missingParams)."}";
          }


        if(!$isError){
            try {
              $course = Course::find($idCourse);

              $course->users()->attach($idUser);

            } catch (Exception $e) {
                $response = "FAILED";
                $statusCode = 400;
                $message = $e->getMessage();
            } // */
        }

        $returnData = array(
            'response'  => $response,
            'status_code' => $statusCode,
            'message'   => $message,
            'result'    => $result,
            'errorType' => $errorType
            );

        return response()->json($returnData, $statusCode);
  }
}
