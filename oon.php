<?php
function curl($url,$a,$json=false){
	$body = 'channelId=230&episodeId=3645&displayAdId=45&engagementId=41&videoTime=40542&eventCode='.$a;
	$arr = array("\r","	");
	$bearer = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2F0Y2hvb25hLmNvbVwvYXBpXC92MVwvbG9naW5cL2dtYWlsIiwiaWF0IjoxNTQ1MTYyOTYyLCJleHAiOjE1NDU3Njc3NjIsIm5iZiI6MTU0NTE2Mjk2MiwianRpIjoibDJiY1VpdkhhZmJyOXBvdiIsInN1YiI6MzQ2MzQ4LCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.iVHyCDde2rDr_B6DvM63ARzBExssqcfcUqtcZXy3DaE";
	$h = explode("\n",str_replace($arr,"","uuid: 6b3814d2-23d4-4bcc-aeb9-e1cdf4fc9a68
	Authorization: Bearer $bearer
	Connection: close
	Content-Type: application/x-www-form-urlencoded
	Content-Length: ".strlen($body)."
	Host: api.watchoona.com
	User-Agent: okhttp/3.10.0"));
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$x = curl_exec($ch); curl_close($ch);
	if($json) $x = json_decode($x,true);
	return $x;
}
$a=20;
$b=$a+20;
while($a<$b){
	echo curl("https://api.watchoona.com/api/v1/analytics/event/display-ad-engagement",$a)."\n";
	$a++;
}