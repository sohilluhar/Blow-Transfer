<?php
$agent=$_SERVER['HTTP_USER_AGENT'];
function URL($url)
{
$proxy='';
$ref='';
$ch = curl_init();
$ckfile = tempnam("/tmp", "CURLCOOKIE");
global $agent;
if($ref=='')
$ref=$url;
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_USERAGENT,$agent );
curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded","Accept: */*"));
curl_setopt($ch, CURLOPT_COOKIEJAR, "$ckfile");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_REFERER, $ref);
return curl_exec($ch);
}

