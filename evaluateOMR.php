<?php
$session_id = $_COOKIE["PHPSESSID"];
session_id("admin");
session_start();
ob_start();

print_r($_POST);
print_r($_FILES);

$host    = "127.0.0.1";
$port    = 2222;
$imgName = $_FILES["myfile"]["name"];
$message = "C:\\xampp\\htdocs\\OMREvaluator\\image\\".$imgName;
if(move_uploaded_file($_FILES["myfile"]["tmp_name"] , $message)){
echo "Message To server :".$message;
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// connect to server
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");
// send string to server
socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
// get server response
$result = socket_read ($socket, 2048) or die("Could not read server response\n");
echo "<br>";
//echo $result;
$data = json_decode($result , true);
echo "<pre>";
//print_r($data);
echo "</pre>";

include "lib/OMR_DS.php";
$info = parse_omr($data , true);

echo "<pre>";
print_r($info);
echo "</pre>";
print_r($_SESSION);
if($session_id == "admin"){
    header("Location: index.php");
}else{
    header("Location: scanning.php");
}
// close socket
socket_close($socket);
}else{
    echo "Couldn't upload file";
}


?>