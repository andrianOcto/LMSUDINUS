<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;

class CourseController extends Controller
{
  public function index()
  {
    return view('page/admin/course/home');;
  }

  public function test(){
    $user   = Auth::user();
    return var_dump($user->id);
  }

  public function readCourse(Request $request){

    return Datatables::of(Course::query())->make(true);
  }

  public function createCourse(Request $request)
  {
    $returnData       = array();
      $response         = "OK";
      $statusCode       = 200;
      $result           = null;
      $message          = "Create course success.";
      $isError          = FALSE;
      $missingParams    = null;
      $errorType        = "code";

      $code             = ($request->input('code') != null) ? $request->input('code'):null;
      $name             = ($request->input('name') != null) ? $request->input('name'):null;
      $description      = ($request->input('description') != null) ? $request->input('description'):null;
      $credit          = ($request->input('credit') != null) ? $request->input('credit'):null;

      if(!isset($code)){
          $missingParams[] = "code";
      }
      if(!isset($name)){
          $missingParams[] = "name";
      }
      if(!isset($description)){
          $missingParams[] = "description";
      }
      if(!isset($credit)){
          $missingParams[] = "credit";
      }

      if(isset($missingParams)){
              $isError = TRUE;
              $response = "FAILED";
              $statusCode = 400;
              $message = "Missing parameters : {".implode(', ', $missingParams)."}";
          }


        if(!$isError){
            try {
              $course = new Course;
              $user   = Auth::user();

              $course->code 	      = $code;
              $course->name 	      = $name;
              $course->creator_id   = $user->id;
              $course->description 	= $description;
              $course->credit 	    = $credit;
              $course->status 	    = "1";

              $course->save();


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
  public function updateCourse(Request $request)
  {
    $returnData       = array();
      $response         = "OK";
      $statusCode       = 200;
      $result           = null;
      $message          = "Update course success.";
      $isError          = FALSE;
      $missingParams    = null;
      $errorType        = "code";

      $id               = ($request->input('idCourse') != null) ? $request->input('idCourse'):null;
      $code             = ($request->input('code') != null) ? $request->input('code'):null;
      $name             = ($request->input('name') != null) ? $request->input('name'):null;
      $description      = ($request->input('description') != null) ? $request->input('description'):null;
      $credit          = ($request->input('credit') != null) ? $request->input('credit'):null;

      if(!isset($code)){
          $missingParams[] = "code";
      }
      if(!isset($name)){
          $missingParams[] = "name";
      }
      if(!isset($description)){
          $missingParams[] = "description";
      }
      if(!isset($credit)){
          $missingParams[] = "credit";
      }

      if(isset($missingParams)){
              $isError = TRUE;
              $response = "FAILED";
              $statusCode = 400;
              $message = "Missing parameters : {".implode(', ', $missingParams)."}";
          }


        if(!$isError){
            try {
              $course = Course::find($id);;
              $user   = Auth::user();

              $course->code 	      = $code;
              $course->name 	      = $name;
              $course->creator_id   = $user->id;
              $course->description 	= $description;
              $course->credit 	    = $credit;

              $course->save();


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
  public function removeCourse(Request $request)
  {
    $returnData       = array();
      $response         = "OK";
      $statusCode       = 200;
      $result           = null;
      $message          = "Delete course success.";
      $isError          = FALSE;
      $missingParams    = null;
      $errorType        = "code";

      $id               = ($request->input('idCourse') != null) ? $request->input('idCourse'):null;

      if(!isset($id)){
          $missingParams[] = "id";
      }

      if(isset($missingParams)){
              $isError = TRUE;
              $response = "FAILED";
              $statusCode = 400;
              $message = "Missing parameters : {".implode(', ', $missingParams)."}";
          }


        if(!$isError){
            try {

              $user = Course::find($id);

              $user->delete();

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
