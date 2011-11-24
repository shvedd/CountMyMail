<?php
 //Namba username
 $username = "";
 //Namba password
 $password = "";
 //outputType (не трогать) 
 $type  = "json";
 //адрес мыла
 $email = "";
 //номер аськи, на который слать количесто новых писем
 $icq_num = "478261996";
 //номер телефона, на который слать количесто новых писем
 $pho_num = "996xxxxxxxxx";

 ############################################################################################
 $b_icq_uin   = "";		//uin бота
 $b_icq_pass  = "";		//pass бота
 ############################################################################################
 $curl 	    = curl_init();			//инициализируем cURL
 
 curl_setopt($curl, CURLOPT_URL, 'http://api.namba.kg/getNewMailCount.php'); 
 curl_setopt($curl, CURLOPT_POST, 1);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_POSTFIELDS, 
 "username=".urlencode("$username")."&password=".urlencode("$password")."&outputType=".urlencode("$type"));
 curl_setopt($curl, CURLOPT_USERAGENT, 'Shved');
 
 $count  = curl_exec($curl);
 $array  = json_decode($count, true);
 $amount = $array['new_messages'];
 	echo $amount;

 if(!empty($amount))
 {
    include('WebIcqLite.class.php');
  
    $send = "You have $amount new messages in:\r\n$email.";    
    $send = iconv("UTF-8","cp1251",$send);

    define('UIN', $b_icq_uin);
    define('PASSWORD', $b_icq_pass);

    $icq = new WebIcqLite();
    
    if($icq->connect(UIN, PASSWORD))
    {
       if(!$icq->send_message("$icq_num", "$send"))
       {
       	  $icq->error();
       }
    }
    $icq->disconnect();
 }
 curl_close($curl);

################################################################################################################
# Чтобы настроить скрипт так, чтобы он отправлял СМС(только мегаком).
# Нужно переменную $send(строка 37), чуть чуть изменить:
# До: "You have..."
# После: "$pho_num\r\nYou have..."
#
# Предворительно заполните переменную $pho_num(строка 13)
# В переменную $icq_num, введите номер 478261996
# Все, теперь вам на телефон придет СМС с количеством новых писем.
#################################################################################################################
?>