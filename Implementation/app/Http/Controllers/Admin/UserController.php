<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
  public function index()
  {
    $users = User::paginate(15);
    return view('page/admin/user/home')->with('users', $users);;
  }

  public function readUser(Request $request,$role=-99,$course=-99){
    if($role == -99 || $course== -99)
    {
      return Datatables::of(User::query())->make(true);
    }
    else
      return Datatables::of(User::query())->make(true);
  }


  public function createUser(Request $request)
  {
    $returnData       = array();
      $response         = "OK";
      $statusCode       = 200;
      $result           = null;
      $message          = "Create user success.";
      $isError          = FALSE;
      $missingParams    = null;
      $errorType        = "username";

      $username         = ($request->input('username') != null) ? $request->input('username'):null;
      $name             = ($request->input('name') != null) ? $request->input('name'):null;
      $phone            = ($request->input('phone') != null) ? $request->input('phone'):null;
      $address          = ($request->input('address') != null) ? $request->input('address'):null;
      $email            = ($request->input('email') != null) ? $request->input('email'):null;
      $image            = ($request->input('image') != null) ? $request->input('image'):null;
      $password         = ($request->input('password') != null) ? $request->input('password'):null;
      $role             = ($request->input('role') != null) ? $request->input('role'):null;

      if(!isset($username)){
          $missingParams[] = "username";
      }
      if(!isset($name)){
          $missingParams[] = "name";
      }
      if(!isset($phone)){
          $missingParams[] = "phone";
      }
      if(!isset($address)){
          $missingParams[] = "address";
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
            $count		  = User::whereRaw("username = '$username'")->count();
            $countEmail = User::whereRaw("email = '$email'")->count();
            if ($count == 0 && $countEmail==0) {
              $user = new User;

              $user->username 	= $username;
              $user->password 	= $password;
              $user->name 	    = $name;
              $user->phone 	    = $phone;
              $user->address 	  = $address;
              $user->email 	    = $email;
              $user->image 	    = "../image/default.png";
              $user->role 		  = $role;

              $user->save();

            } else if($count != 0){
              $response 	= "FAILED";
              $statusCode = 200;
              $errorType  = "username";
              $message 	= "Duplicate username $username.";
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
  public function updateUser(Request $request)
  {
    $returnData       = array();
      $response         = "OK";
      $statusCode       = 200;
      $result           = null;
      $message          = "Update user success.";
      $isError          = FALSE;
      $missingParams    = null;
      $errorType        = "username";

      $id               = ($request->input('idUser') != null) ? $request->input('idUser'):null;
      $username         = ($request->input('username') != null) ? $request->input('username'):null;
      $name             = ($request->input('name') != null) ? $request->input('name'):null;
      $phone            = ($request->input('phone') != null) ? $request->input('phone'):null;
      $address          = ($request->input('address') != null) ? $request->input('address'):null;
      $email            = ($request->input('email') != null) ? $request->input('email'):null;
      $image            = ($request->input('image') != null) ? $request->input('image'):null;
      $password         = ($request->input('password') != null) ? $request->input('password'):null;
      $role             = ($request->input('role') != null) ? $request->input('role'):null;

      if(!isset($id)){
          $missingParams[] = "id";
      }
      if(!isset($username)){
          $missingParams[] = "username";
      }
      if(!isset($name)){
          $missingParams[] = "name";
      }
      if(!isset($phone)){
          $missingParams[] = "phone";
      }
      if(!isset($address)){
          $missingParams[] = "address";
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

            $count		  = User::whereRaw("username = '$username' and id != '$id'")->count();
            $countEmail = User::whereRaw("email = '$email' and id != '$id'")->count();
            if ($count == 0 && $countEmail==0) {
              $user = User::find($id);

              $user->username 	= $username;
              $user->password 	= Hash::make($password);
              $user->name 	    = $name;
              $user->phone 	    = $phone;
              $user->address 	  = $address;
              $user->email 	    = $email;
              $user->role 		  = $role;

              $user->save();

            } else if($count != 0){
              $response 	= "FAILED";
              $statusCode = 200;
              $errorType  = "username";
              $message 	= "Duplicate username $username.";
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
      $errorType        = "username";

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
