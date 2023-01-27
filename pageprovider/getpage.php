<?php
include "pages.php";
if(isset($_POST["request"])){

   switch($_POST["request"]){
    case "Set Answers":
        setanswers();
        break;
    case "History":
        merit_list();
        break;
    case "Manage Candidates":
        manage_candidates();
        break;
    case "Scanning":
        start_scanning();
        break;
    case "Top 20":
        top_twenty();
        break;
    case "Settings":
        settings();
        break;

    default:
       echo "No any data available for your requested page";
   }


}else{
    echo "Api requires some post data";
}

?>