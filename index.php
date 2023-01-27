
<?php include "include/header.php"; 

if(!isset($_SESSION["login"])){
    include "include/navigation.php";
    include "include/sidebar.php";
    include "include/alert_dialog.php";
    include "include/footer.php";
}else{
    include "landing.php";
}


?>

















