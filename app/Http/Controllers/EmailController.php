<?php
/**
 * Created by PhpStorm.
 * User: sjwiq200
 * Date: 2018. 9. 28.
 * Time: AM 12:29
 */

namespace App\Http\Controllers;


use App\Products;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmailController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function sendEmail($email) {

        $data = array(
           'email' => $email
        );

        $randNo = (string)rand(0,9).(string)rand(0,9).(string)rand(0,9).(string)rand(0,9);
        Session::put("emailAuth",$randNo);

        Mail::send([],$data, function ($message) use ($email,$randNo) {
            $message->to($email)
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_USERNAME'))
                ->subject("Laravel Mail Test")
                ->setBody("인증번호 : ".$randNo, "text/html;charset=utf-8");

        });
        return $randNo;
    }



}
