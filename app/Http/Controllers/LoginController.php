<?php

namespace App\Http\Controllers;

use App\Library\Common;
use App\Users;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(Request $request) {

        $userId = $request->input('user-id','sex');
        $userPassword = $request->input('user-password','sex');
        $commonLib = new Common();
        $userModel = new Users();
        $selectLoginUser = $userModel->selectDefault()->where('user_id','=',$userId)->where('user_password','=',$userPassword)->get();

        if(count($selectLoginUser) >0) {
            $request->session()->put('users', $selectLoginUser[0]['user_id']);
            return view('main')->with('user');

        } else {
            $commonLib->alert("아디비번안맞아 ㅡㅡ");
            $commonLib->locationHref("/");
        }

    }

    public function logout() {
        Session::remove('users');
        return view('login');

    }

    public function loginCheck() {

        if( Session::has('users')){
            return view('main');
        }else{
            return view('login');
        }
    }
}
