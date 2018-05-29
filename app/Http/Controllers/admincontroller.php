<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admincontroller extends Controller
{
    //
    public function contact($id,$name){
        $arr = array('id' =>$id, 'name' =>$name);
      return view('contact',$arr);
  }
    // public function home(){
    //     return view('home');
    // }
    // public function home(){
    //     return view('home');
    // }
}
