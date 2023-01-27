<?php
include "../include/conn.php";


if($_POST["id"]==0){
    echo $sql = "insert into  students (roll, name ) values (".$_POST["roll"].",'".$_POST["name"]."' )";
   
}else{
    echo $sql = "update students set roll=".$_POST["roll"].", name='".$_POST["name"]."' where id=".$_POST["id"];
   
    
}
mysqli_query($conn , $sql);
?>