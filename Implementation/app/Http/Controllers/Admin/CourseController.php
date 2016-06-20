<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;

class CourseController extends Controller
{
  public function index()
  {
    return view('page/admin/course/home');;
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

              $course->code 	      = $code;
              $course->name 	      = $name;
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
  public function updateUser(Request $request)
  {
    $returnData       = array();
      $response         = "OK";
      $statusCode       = 200;
      $result           = null;
      $message          = "Update user success.";
      $isError          = FALSE;
      $missingParams    = null;
      $errorType        = "code";

      $id               = ($request->input('idUser') != null) ? $request->input('idUser'):null;
      $code         = ($request->input('code') != null) ? $request->input('code'):null;
      $name             = ($request->input('name') != null) ? $request->input('name'):null;
      $description            = ($request->input('description') != null) ? $request->input('description'):null;
      $credit          = ($request->input('credit') != null) ? $request->input('credit'):null;
      $email            = ($request->input('email') != null) ? $request->input('email'):null;
      $image            = ($request->input('image') != null) ? $request->input('image'):null;
      $password         = ($request->input('password') != null) ? $request->input('password'):null;
      $role             = ($request->input('role') != null) ? $request->input('role'):null;

      if(!isset($id)){
          $missingParams[] = "id";
      }
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
      if(!isset($email)){
          $missingParams[] = "email";
      }
      if(!isset($password)){
          $missingParams[] = "password";
      }
      if(!isset($role)){
          $missingParams[] = "role";
      }
      if(isset($missingParams)){
              $isError = TRUE;
              $response = "FAILED";
              $statusCode = 400;
              $message = "Missing parameters : {".implode(', ', $missingParams)."}";
          }


        if(!$isError){
            try {

            $count		  = User::whereRaw("code = '$code' and id != '$id'")->count();
            $countEmail = User::whereRaw("email = '$email' and id != '$id'")->count();
            if ($count == 0 && $countEmail==0) {
              $user = User::find($id);

              $user->code 	= $code;
              $user->password 	= $password;
              $user->name 	    = $name;
              $user->description 	    = $description;
              $user->credit 	  = $credit;
              $user->email 	    = $email;
              $user->role 		  = $role;

              $user->save();

            } else if($count != 0){
              $response 	= "FAILED";
              $statusCode = 200;
              $errorType  = "code";
              $message 	= "Duplicate code $code.";
            }
            else if($countEmail !=0){
              $response 	= "FAILED";
              $statusCode = 200;
              $errorType  = "email";
              $message 	= "Duplicate email $email.";
            }

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
  public function removeUser(Request $request)
  {
    $returnData       = array();
      $response         = "OK";
      $statusCode       = 200;
      $result           = null;
      $message          = "Delete user success.";
      $isError          = FALSE;
      $missingParams    = null;
      $errorType        = "code";

      $id               = ($request->input('idUser') != null) ? $request->input('idUser'):null;

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

              $user = User::find($id);

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
