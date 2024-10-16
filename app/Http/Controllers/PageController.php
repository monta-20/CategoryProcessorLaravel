<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function print_page1(){
        return view('page1');
    }

    public function print_page2(){
        return view('page2');
    }

    public function send_data(){
        $name ="Montassar";
        $age = 23;
        $Countries = ['TUN','ALG','EGY'];
        return view('Data.index')->with("name",$name)->with("age",$age)->with("Countries",$Countries);
    }
}
