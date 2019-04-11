<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\TwitchDriver;

class GameController extends Controller
{
    public function index(){
      $response=TwitchDriver::sendTwitchRequest('/games/top',['first' => 100]);
      return view('viewGames',['games' => $response->data]);
    }
}
