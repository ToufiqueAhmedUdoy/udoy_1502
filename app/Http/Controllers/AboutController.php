<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        $name = 'Anik';
        $email = 'anik@gmail.com';
        return view('about', ['myname'=>$name, 'myemail'=>$email]);
    }
}
