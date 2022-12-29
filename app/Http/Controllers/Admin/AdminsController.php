<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //
    public function __construct()
    {
        $this->admin='admin/pages/';
        // $this->IndexController = new IndexController;
    }
    public function getHome(){
        // $this->admin.'home'
        return view($this->admin.'home');
    }


    public function getLogin(){


    }

    public function postLogin(){

        
    }
}
