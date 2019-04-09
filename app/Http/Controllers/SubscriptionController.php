<?php

namespace App\Http\Controllers;
use App\Http\Helpers\TwitchDriver;
use Illuminate\Http\Request;
use App\Subscription;
use Illuminate\Routing\Route;

class SubscriptionController extends Controller
{
    //the subscription function is kinda crappy right now. currently it takes the top 20 videos 
    //from each twitch user you are subscribed to, and displayes them in a list in cronological order
    //we should change this so that it gets the most recent videos from all of your subscriptions. 
    public function index(){
        $subs=auth()->user()->subscriptions;
        $clips=array();
        //get the biggest 20 twitch clips from each brocaster
        foreach($subs as $sub){
            $response=TwitchDriver::sendTwitchRequest('/clips',['broadcaster_id' => $sub->tuser_id]);
            $clips=array_merge($clips, $response->data);
        }
        //sort the responses by start time
        usort($clips,array($this,'compareResponses'));
        
        return view('sub/subscriptions',['clips'=>$clips]);
    }

    public function tuser_manage_subscriptions() {
      # Aggregate subscriptions and pass them into the view HERE!
      $subs = auth()->user()->subscriptions;
      $tuser_infos = array();
      foreach ($subs as $sub) {
        $user_query = TwitchDriver::sendTwitchRequest('/users', ['id' => $sub['tuser_id']])->data;
        array_push($tuser_infos, $user_query[0]);
      }
      $view_data = [ 'subscriptions' => $tuser_infos
                   ];
      return view('sub/subscription_manager', $view_data);
    }

    public function compareResponses($response1, $response2){
        return strcmp($response2->created_at, $response1->created_at);
    }

    public function subscribe($tuser_id){
        $sub=Subscription::createSubscription(auth()->id(),$tuser_id);
        $sub->save();
        return redirect("/tusers/$tuser_id");
    }

    public function unsubscribe($tuser_id){
        $sub=Subscription::where('user_id', auth()->id())->where('tuser_id',$tuser_id)->first();
        $sub->delete();
        $route_name = \Route::currentRouteName();
        if ($route_name == 'tuser_manage_subscriptions_unsubscribe') {
          return $this->tuser_manage_subscriptions();
        } else {
          return redirect("/tusers/$tuser_id");
        }
    }
}



