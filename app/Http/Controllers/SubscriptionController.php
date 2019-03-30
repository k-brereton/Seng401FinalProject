<?php

namespace App\Http\Controllers;
use App\Http\Helpers\TwitchDriver;
use Illuminate\Http\Request;
use App\Subscription;

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
        return redirect("/tusers/$tuser_id");
    }
}



