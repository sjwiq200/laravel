<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function signUp(Request $request) {

        $emailAuto = $request->input('email-auth-no');

        if(Session::get("emailAuth") == $emailAuto) {
            $userId =$request->input("user-id");
            $userName = $request->input('user-name');
            $userPassword = Crypt::encrypt($request->input('user-password'));

            $array = array(
                'user_id' =>$userId,
                'user_password'=>$userPassword,
                'user_name'=>$userName
            );
            $usersModel = new Users();
            $usersModel->insertDefault($array);

        }//End if

        $request->setSession('users',$userId);
        return view('main')->with('users');
    }
}
