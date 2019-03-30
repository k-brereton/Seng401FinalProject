<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public static function createSubscription($user_id, $tuser_id){
        $sub=new Subscription;
        $sub->user_id=$user_id;
        $sub->tuser_id=$tuser_id;
        return $sub;
    }
    public function user(){
      return $this->belongsTo('App\User');
  }
}
