<?php
namespace App\Http\Helpers;


class TwitchDriver{

public static function sendTwitchRequest($path,$urlParameters){
  $context=TwitchDriver::createHttpContext();
  $url=TwitchDriver::createUrl($path,$urlParameters);
      
  // Open the file using the HTTP headers set above
  $file = file_get_contents($url, false, $context);
  return json_decode($file);
}

private static function createHttpContext(){
  $opts = array(
      'http'=>array(
          'method'=>"GET",
          'header'=>"Accept-language: en\r\n" .
          "Client-ID: bd6ipivyk8rkbcgovkl5p66o98x6bq \r\n"
      )
  );
  $context = stream_context_create($opts);
  return $context;
}
private static function createUrl($path, $params){
    $encoded_params = array();

    foreach ($params as $k => $v){
        $encoded_params[] = urlencode($k).'='.urlencode($v);
    }
    $url = "https://api.twitch.tv/helix$path?".implode('&', $encoded_params);
    return $url;
}

}
