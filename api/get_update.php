<?php
session_id("admin");
session_start();
if(isset($_SESSION["result"])){
echo json_encode($_SESSION["result"]);
}
unset($_SESSION["result"]);
?>