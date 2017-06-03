<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

require_once 'resources\org\Code.class.php';

class LoginController extends CommonController
{

    public function login(){
        if ($input = Input::all()){
            $code = new \Code();
            $_code = $code->get();
            if(strtoupper($input['code'])!=$_code){
                return back()->with('msg','验证码错误！');
           }
           $user = User::first();

            if($user->user_name != $input['user_name']||Crypt::decrypt($user->user_pass)!=$input['user_pass']){
               return back()->with('msg','用户名或者密码错误！');
            }

        }

    return view('admin/login');
    }




    public function code(){
        $code = new \Code();
        $code->make();
    }


}
