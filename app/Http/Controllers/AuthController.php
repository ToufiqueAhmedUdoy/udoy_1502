<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function storeRegister(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $confirm = $request->confirm;
        if($password != $confirm){
            return redirect()->back()->with('error', 'Password Mismatch');
        }
        else {
            $obj = new User();
            $obj->name = $name;
            $obj->email = $email;
            $obj->password = md5($password);
            $obj->role = 'Student';
            if($obj->save()){
                return redirect()->back()->with('success', 'Account Created. Waiting for admin approval.');
            }
        }
    }
    public function login(){
        return view('auth.login');
    }
    public function storeLogin(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', '=', $email)
            ->where('password', '=', md5($password))
            ->first();
        if($user){
            if($user->active == 0){
                return redirect()->back()->with('info', 'Account Not Approved Yet.');
            }
            else {
                Session::put('username', $user->name);
                $request->session()->put('userrole', $user->role);
                return redirect('dashboard');
            }
        }
    }

    public function dashboard(){
        return view('auth.dashboard');
    }
}
public function user(){


    $users=user:all()
    returns view('auth.user',compact('users'));
    }
    public function user(){
        $users=user:all;
        returns view('auth.dashboard');
    }

