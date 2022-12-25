<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->user='guest/pages/';
        // $this->IndexController = new IndexController;
    }
    //
    public function getHome(){
        return view($this->user.'home');
    }
}
