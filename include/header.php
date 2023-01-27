<?php
//session_id("admin");
session_start();
if(isset($_POST["pmarkI"])){
  $_SESSION = $_POST;
}
//print_r($_SESSION);
if(isset($_SESSION[""])){

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="font/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <title>OMR Evaluator</title>
  </head>
<style>
.body {
  
}
nav {
  background:#f0e0f0;
}
.sidebar {
  /*border: 1px solid blue;*/
  display: inline-block;
  height: 100%;
}
#page {
  /*border: 2px solid red;*/
  float: right;
  display: inline-block;
  padding: 20px;
  height: 100%;
  overflow:visible;
}
</style>
  <body>