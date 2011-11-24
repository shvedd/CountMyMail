<?php
 
 $username = "izotvorec"; //username
 $password = "wc3dfclm";  //password
 $type     = "json";       //outputType 
 $curl 	   = curl_init();
 
 curl_setopt($curl, CURLOPT_URL, 'http://api.namba.kg/getNewMailCount.php'); 
 curl_setopt($curl, CURLOPT_POST, 1);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_POSTFIELDS, 
 "username=".urlencode("$username")."&password=".urlencode("$password")."&outputType=".urlencode("$type"));
 curl_setopt($curl, CURLOPT_USERAGENT, 'Shved');
 
 $count = curl_exec($curl);
 $array = json_decode($count, true);
 echo $array['new_messages'];
 curl_close($curl);

?>