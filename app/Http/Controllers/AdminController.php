<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use DB;
use Session;

class AdminController extends Controller
{
    public function loginAdmin(){
        return view('pagesadmin.admin.login.loginAdmin');
    }
    public function postLoginAdmin(Request $request){
        $remember= $request->has('remember_me')?true:false;
        if(auth()->attempt([
            'email'=> $request->email,
            'password'=> $request->password
        ], $remember)){
            return redirect()->to('adminIndex');

        } else{
            Session::put('message','Email hoặc mật khẩu không chính xác, vui lòng nhập lại');
            return redirect()->to('admin');
        }


    }
    public function logout(){
        Auth()->logout();
        return redirect()->to('admin');
    }
    public function admin(){
        return view('pagesadmin.home');
    }
}
