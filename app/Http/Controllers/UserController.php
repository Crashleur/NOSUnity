<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use App\TopicType;
use App\User;
use App\Team;
use App\Tournament;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getEditAuth(){

    }

    public function postEditAuth(){

    }
}
