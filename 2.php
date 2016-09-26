<?php
function curll($u){
    $ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$u);
// Execute
return curl_exec($ch);
// Closing
curl_close($ch);

}
$us='http://live.bilibili.com/h5/all?ajax=1&page='.rand(1,100);
$jso=curll($us);

// Will dump a beauty json :3
$jso=json_decode($jso, true);
$r=rand(0,31);
$j='http://live.bilibili.com/api/playurl?platform=h5&cid='.$jso[data][$r][roomid];
$j=curll($j);
$j=json_decode($j, true);
$j=$j[data];
header("HTTP/1.1 301 Moved Permanently"); 
header("Location: $j"); 
