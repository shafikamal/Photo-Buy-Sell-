<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

class UserAuthController extends Controller
{
    public function showRegister(){
        return view('user.register');
    }

    public function  register(){
       $this->validate(\request(),[
           'username'=>'required|min:4|alpha_dash',
           'email'=>'required|unique:users,email',
           'password'=>'required|min:4|confirmed'

       ]);
        DB::transaction(function (){
            $user= User::create([
                'username'=>\request('username'),
                'email'=>\request('email'),
                'password'=>bcrypt(request ('password')),
            ]);
       $user->financial()->create([
           'balance'=>0.00,
       ]);
        });

        return 'successfully done';
    }

    //LOGIN ATTEMPT
    public function showLogin(){
        return view('user.login');
    }

    public  function login(){
        $this->validate(\request(),[
            'username'=>'required',
            'password'=>'required'

        ]);

       if (Auth::attempt([
           'username'=>\request('username'),
           'password'=>\request('password')
       ])) {
           return redirect('index');
       }else{
           return 'credential mismatch';
       }

    }

    public function logout(){
        Auth::logout();
        return redirect('index');
    }

//FORGET PASSWORD
    public function showForget(){
        return view('user.forget');
    }

    public function forget(){
        $this->validate(\request(),[
            'email'=>'required|email',
        ]);
        $userExists =User::where('email',\request('email'));

        if ($userExists->count() == 1){

            $data= [];
            $userExists = $userExists->first();
            $genarateToken=sha1(md5(rand()));
            $checkForgetEntry=PasswordReset::where('email',\request('email'));

            if ($checkForgetEntry->count()>0){
                $checkForgetEntry->update([
                    'token'=>$genarateToken
                ]);
            }else{

                PasswordReset::create([
                    'user_id'=>$userExists->id,
                    'email'=>$userExists->email,
                    'token'=>$genarateToken
                ]);
            }

            $data['email']=$userExists->email;
            $data['token']=$genarateToken;

            Mail::to($userExists->email)->send(new \App\Mail\PasswordReset($data));
            return 'done';
        }else{
            return 'Incorrect Email';
        }
    }
 //PASSWORD RESET
    public function showPasswordReset($email,$token){
        $check=PasswordReset::where('email',$email)->where('token',$token);
        if ($check->count() == 1){
            $user_id=$check->first()->user_id;
            return view('user.passwordReset',compact('user_id'));
        }else{
            return  'Unauthorized';
        }
    }

    public function passwordReset(){
        $user_id=\request('user_id');
        User::find('id',$user_id)->update([
            'password'=>bcrypt(\request('password'))
        ]);

        PasswordReset::where('user_id',$user_id)->delete();
        return  'Password Reset done "Alhamdulillah" ';
    }
}
