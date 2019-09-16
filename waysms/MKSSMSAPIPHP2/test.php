<?php
include("EnggTGR_CURL_LIB.php");
$mobile="xxxxxxxxxx";
$message="test message";
$json = json_decode(URL("https://smsapi.engineeringtgr.com/send/?Mobile=xxxxxxxxxx&Password=xxxxxx&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=xxxxxxxxxxxxxx") ,true);
if ($json["status"]==="success") {
    echo $json["msg"];
    //your code when send success
}else{
    echo $json["msg"];
    //your code when not send
}