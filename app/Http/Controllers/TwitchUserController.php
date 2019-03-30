<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\TwitchDriver;
//tuser means twitch user. 

//this is the class which controls how users find each twitch user (tuser for short)
class TwitchUserController extends Controller
{
    public function findByGame($game_id){
        $streams=TwitchDriver::sendTwitchRequest('/streams',['game_id' => $game_id]);
        return view('tuser/tuserListView',['streams'=> $streams->data]);
    }
    //views a single twitch user. 
    public function viewTuser($tuser_id){
        $tuser=TwitchDriver::sendTwitchRequest('/users',['id' => $tuser_id]);
        $user=\Auth::user();
        //if nobody is logged in, show not logged in page.
        if(is_null($user)){
            return view('tuser/singleTuserNotLogedIn', ['tuser' => $tuser->data[0]]);
        }
        return view('tuser/singleTuser',['tuser' => $tuser->data[0],'user' => $user]);
    }
}
