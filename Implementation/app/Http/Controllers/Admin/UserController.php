<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
  public function index()
  {
      return view('page/admin/user/home');
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

            $count		= User::whereRaw("username = '$username'")->count();

            if ($count == 0) {
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

            } else {
              $response 	= "FAILED";
              $statusCode = 200;
              $message 	= "Someone already has that username.";
            }

            } catch (Exception $e) {
                $response = "FAILED";
                $statusCode = 400;
                $message = $e->getMessage();
            } // */
        }

        $returnData = array(
            'response' => $response,
            'status_code' => $statusCode,
            'message' => $message,
            'result' => $result
            );

        return response()->json($returnData, $statusCode);
  }
}
