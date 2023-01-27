<?php
session_start();
include "../include/conn.php";
include "../lib/OMR_DS.php";
$sql= "select * from merit_list join students on merit_list.roll=students.roll where merit_list.ids=".$_POST["id"];
$res = mysqli_query($conn , $sql);
$data = mysqli_fetch_assoc($res);
$secI = explode("/" , $data["secI"]);
$secII = explode("/" , $data["secII"]);
$roll = str_split($data["roll"]);
while(sizeof($roll)<4){
    array_unshift($roll , 0);
}
$ans_array = getAnswerfromDB();
//print_r($ans_array);
//print_r($secI);
?>
<style>
    .detail_omr {
        width: 100%;
      /*  border: 3px solid green;*/
    }
    .col_omr {
        width: 50%;
        font-size: larger;
       /* border: 3px solid red;*/
    }

    .box_omr {
        border: 1px solid black;
        width: 30%;
        height: 1000px;
        margin: 20px;

    }

    .roll_omr {
        height: 500px;
        text-align: left;
    }

    .secI_omr {
        position: absolute;
        left: 32%;
        
    }

    .sections_omr {
        height: 1050px;
        position: relative;
       /* border: 2px solid green;*/
        margin: 50px 0px;
    }

    .circles_omr {
        width: 20%;
        border: 10px solid yellow;
        padding: 0 15px;
    }
    .option_omr {
        width: 100%;
       /* border: 2px solid brown;*/
        position: relative;
       margin-top: 24px;
      
    }
    .dots_omr {
        border-radius: 50%;
        height: 100px;
        width: 100px;
        border: 2px solid black;
        color: blue;
        padding: 5px 5px;
        margin: 0 10px;
    }
    .correct {
        background: green !important;
        color: white;
    }
    .wrong {
        background: red;
        color: white;
    }
    .marked {
        background: black;
        color: white;
    }
    li{
        display: inline;
    }
    info {
       font-weight: bolder;
    }
</style>
<h1>Sample Questions</h1>
<div class="detail_omr">
    <div class="col_omr" style="float:left;">Name:- <info><?php echo $data["name"];?></info>
    </div>
    <div class="col_omr" style="float:right;">Roll:- <info><?php echo $data["roll"];?></info>
    </div>
</div>
<div class="sections_omr">
    <div class="box_omr roll_omr" style="float:left;">
    <?php for($i=0;$i<10;$i++){
           $index = array_search($i , $roll);
        ?>
        <ul class="option_omr" type="none">
            <li><?php echo $i;?></li>
            <li class="dots_omr A <?php echo ($index===0)?"marked":"" ?>">A</li>
            <li class="dots_omr B <?php echo ($index==1)?"marked":"" ?>">B</li>
            <li class="dots_omr C <?php echo ($index==2)?"marked":"" ?>">C</li>
            <li class="dots_omr D <?php echo ($index==3)?"marked":"" ?>">D</li>           
    </ul>
        <?php } ?>
    </div>
    <div class="box_omr secI_omr" style="float:center;">
    <?php for($i=0;$i<20;$i++){ 
        $ans = $ans_array[$i];
        $class = array(" " , " " , " " , " ");
        if($ans == $secI[$i]){ $class[$ans] .="correct";}
        else{
        $class[$ans] .= "marked";
        if(!($secI[$i]==-1)){
        $class[$secI[$i]] .= "wrong";
        }
        }
        ?>
        <ul class="option_omr" type="none">
            <li><?php echo $i+1;?></li>
            <li class="dots_omr <?php echo $class[0];?>">A</li>
            <li class="dots_omr <?php echo $class[1];?>">B</li>
            <li class="dots_omr <?php echo $class[2];?>">C</li>
            <li class="dots_omr <?php echo $class[3];?>">D</li>
            
    </ul>
        <?php } ?>
    </div>
    <div class="box_omr secII_omr" style="float:right;">
    <?php for($i=0;$i<20;$i++){ 
        $ans = $ans_array[$i+20];
        $class = array(" " , " " , " " , " ");
        if($ans == $secII[$i]){ $class[$ans] .="correct";}
        else{
        $class[$ans] .= "marked";
        if(!($secII[$i]==-1)){
        $class[$secII[$i]] .= "wrong";
        }
        }
        ?>
        <ul class="option_omr" type="none">
            <li><?php echo $i+1;?></li>
            <li class="dots_omr <?php echo $class[0];?>">A</li>
            <li class="dots_omr <?php echo $class[1];?>">B</li>
            <li class="dots_omr <?php echo $class[2];?>">C</li>
            <li class="dots_omr <?php echo $class[3];?>">D</li>
            
    </ul>
        <?php } ?>
</div>
</div>