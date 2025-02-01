<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function register(){
        return view('pages.auth.register');
    }

    public function login(){
        return view('pages.auth.login');
    }

    public function forgetPassword(){
        return view('pages.auth.forget-password');
    }

    public function profile(){
        return view('pages.profile');
    }

    public function dashboard(){
        return view('pages.index');
    }
    public function server(){
        return view('pages.servers');
    }
    
    public function serverDetail($id){
        return view('pages.server-detail' , compact('id'));
    }
    
    public function ServerActivities(){
        return view('pages.server-activity');
    }

    public function serverTemplate(){
        return view('pages.server-template');
    }

    public function serverOperatingSystem(){
        return view('pages.server-os');
    }

    public function region(){
        return view('pages.region');
    }

    public function credit(){
        return view('pages.credit');
    }
}
