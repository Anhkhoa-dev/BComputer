<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    
    public function __construct()
    {
        $this->user='guest/pages/';
        // $this->IndexController = new IndexController;
    }

    public function logIn(){

        return view($this->user.'login.login');
    }
}
