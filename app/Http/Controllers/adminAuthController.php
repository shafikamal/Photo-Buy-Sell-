<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminAuthController extends Controller
{
    public function showAdminLogin(){
        return view('admin/adminLogin');
    }
    public function adminLogin(){
        $this->validate(\request(),[
            'username'=>'required',
            'password'=>'required'
        ]);

        if (Auth::guard('admin')->attempt([
            'username'=>\request('username'),
            'password'=>\request('password')
        ])){
            return redirect(url('admin/dashboard'));

        }else{
          return 'Credential mismatch';
        }

    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect(url('admin/login'));
    }
}
