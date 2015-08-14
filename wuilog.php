<?php
require_once('twitteroauth/twitteroauth.php');
$file = file("Path To Wui Log");
$replace = "/[0-9]+\\.[0-9]+\\.[0-9]+\\.[0-9]+/";
$list = array(
    "通知しないIPアドレス（自分のIPとか)",
    "通知しないIPアドレス（自分のIPとか)",
    "通知しないIPアドレス（自分のIPとか)"
);

foreach ($file as $row) {
    if (strstr($row, "GET")) {
        preg_match($replace, $row, $a);
        if (!in_array($a[0], $list, TRUE)){
            $array[] = $a[0];
        }
    }
}

$array = array_unique($array);
$array = array_values($array);

foreach ($array as $row) {
    toTweet($row, checkWhois($row));
}

toDeleteWuiLog($file);


function toTweet($ip, $descr)
{
    $sConsumerKey = "ConsumerKey";
    $sConsumerSecret = "ConsumerKeySecret";
    $sAccessToken = "AccessToken";
    $sAccessTokenSecret = "AccessTokenSecret";
    $twObj = new TwitterOAuth($sConsumerKey, $sConsumerSecret, $sAccessToken, $sAccessTokenSecret);
    $sTweet = "@ScreenName Warning IPaddress ${ip} Organization:${descr}";
    $vRequest = $twObj->OAuthRequest("https://api.twitter.com/1.1/statuses/update.json", "POST", array("status" => $sTweet));
}
function checkWhois($ip)
{
    $descr = shell_exec("whois $ip |grep -m 1 descr:");
    $descr = trim(preg_replace("/descr:/", "", $descr));
    return $descr;
}
function toDeleteWuiLog($file){
    shell_exec(": > $file");
}