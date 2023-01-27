<?php

$username= "vinaykr23766@gmail.com";
$password = "qwerty";

$source = "action=ajaxhandler&xaction=adminPanelLogin&username=".$username."&passwd=".$password;

$cookie = 'PHPSESSID=o0j2t2qplffvvtovign7im5ofk;';

$headers   = array();
$headers[] = 'Cookie: ' . $cookie;

$url = "https://www.gpp7.org.in/wp-admin/admin-ajax.php";   
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$res = curl_exec($ch);   
echo htmlspecialchars($res);


?>