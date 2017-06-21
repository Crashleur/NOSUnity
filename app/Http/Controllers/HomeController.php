<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;
use App\TopicType;
use App\User;
use App\Team;
use App\Tournament;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$annonces = Topic::where('topic_type.slug', TopicType::annonce)->orderBy('created_at', 'desc')->limit(5)->get();
        //$reunion = Topic::where('topic_type.slug', TopicType::reunion)->orderBy('created_at', 'desc')->first();
        $classment_user = User::orderBy('score', 'desc')->limit(10)->get();
        $classment_team = Team::orderBy('score', 'desc')->limit(10)->get();
        $tournaments = Tournament::where('open', true)->get();

        $data = array(
            //'annonces' => $annonces,
            //'reunion' => $reunion,
            'classment_user' => $classment_user,
            'classment_team' => $classment_team,
            'tournaments' => $tournaments
        );
        return view('home.accueil');
    }
}
