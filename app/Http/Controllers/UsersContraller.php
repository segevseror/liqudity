<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersContraller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usersLogin');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        
        $user = DB::table('users')
        ->where('email', '=' , $email)
        ->first();

        if(!$user){
            return redirect()->route('login')->withErrors(['details' => 'One of the details is incorrect'], 'login');
        }


        if(Hash::check($password, $user->password)){
            session(['logged' => true]);
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->withErrors(['details' => 'One of the details is incorrect'], 'login');
        }
    }

}
