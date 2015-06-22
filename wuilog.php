<?php
require_once('twitteroauth/twitteroauth.php');
$file = file("ここにログwuiのパス");
# $file = file("/home/chinachu/Chinachu/log/wui");
$replace = "/(^(\\S+ ){6}::ffff:| (\\S)+$)/";
$list = array(
    "通知しないIPアドレス（自分のIPとか)",
    "通知しないIPアドレス（自分のIPとか)",
    "通知しないIPアドレス（自分のIPとか)"
);

foreach($file as $row) {
    if(strstr($row, "::ffff:")) {
        $replaced = trim(preg_replace($replace, "", $row));
        if(!in_array($replaced, $list, true)){
            $array[] = $replaced;
        }
    }
}

$array = array_unique($array);
$array = array_values($array);

foreach($array as $row){
    toTweet($row);
}

function toTweet($ip){
    $sConsumerKey = "ConsumerKey";
    $sConsumerSecret = "ConsumerKeySecret";
    $sAccessToken = "AccessToken";
    $sAccessTokenSecret = "AccessTokenSecret";
    $twObj = new TwitterOAuth($sConsumerKey, $sConsumerSecret, $sAccessToken, $sAccessTokenSecret);
    $sTweet = "@自分のscreen_name Warning IPaddress $ip";
    $vRequest = $twObj->OAuthRequest("https://api.twitter.com/1.1/statuses/update.json", "POST", array("status" => $sTweet));
}