<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    
    public function __construct()
    {
        $this->user='guest/pages/';
        // $this->IndexController = new IndexController;
    }
    

}
