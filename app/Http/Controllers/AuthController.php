<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){

            if(Auth::user()->user_type == User::USER_TYPE_USER){
                if( Auth::user()->status == User::STATUS_ACTIVE){
                    Session::flash('success','Agent Successfully Login');
                    return redirect()->route('user.home');
                }else{
                    Auth::logout();
                    Session::flash('error','Your Account now is on pending.');
                    return redirect()->route('login');
                }
            }

            if(Auth::user()->user_type == User::USER_TYPE_ADMIN){
                Session::flash('success','Admin Successfully Login');
                return redirect()->route('admin.home');
            }
            else{
                Auth::logout();
                return redirect()->route('login');
            }

        }

        return view('auth.login');
    }

    public function showSignupForm(){
        return view('auth.signup');
    }

    public function signup(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->user_type = User::USER_TYPE_USER;
            $user->status = User::STATUS_INACTIVE;
            $user->save();
            DB::commit();

            if(Auth::attempt(['email' => $user->email,'password' => $user->password])){
                Session::flash('success','Agent Successfully Login');
                return redirect()->route('user.home');
            }

        }
        catch (\Exception $exception){
            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
