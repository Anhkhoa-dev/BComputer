<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        
        $this->user='guest/pages/';
        // $this->IndexController = new IndexController;
    }
    //
    public function getHome(){
         //dd(Auth::user()->image);
        return view($this->user.'home');
    }
}
