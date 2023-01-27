<?php
 $threshold = $_SESSION["threshold"];
function save_result($roll , $secI , $secII ){
    $conn = mysqli_connect("localhost" , "root" , "" , "OMRevaluator");
 $sql = "insert into merit_list (roll , secI , secII) values (".$roll." , '".toString($secI)."' , '".toString($secII)."' )";
 
 $result = getResult($secI , $secII);
 $marks1 = $result[0][0]*$_SESSION["pmarkI"] + $result[1][0]*$_SESSION["nmarkI"] + $result[2][0]*$_SESSION["markI"]    +       $result[3][0]*$_SESSION["dmarkI"];
 $marks2 =$result[0][1]*$_SESSION["pmarkII"] + $result[1][1]*$_SESSION["nmarkII"] + $result[2][1]*$_SESSION["markII"] +         $result[3][1]*$_SESSION["dmarkII"];
 $marksall =$marks1+$marks2;

 $arr = array("name"=> getNameByRoll($roll), "roll"=>$roll, 
              "secI"=> array("correct"=>$result[0][0] , "wrong"=> $result[1][0], "not_attempted"=> $result[2][0], "duplicate"=>$result[3][0],
               "marks"=> $marks1  ), 

              "secII"=>  array("correct"=>$result[0][1], "wrong"=> $result[1][1], "not_attempted"=> $result[2][1], "duplicate"=>$result[3][1],
              "marks"=>  $marks2 ),

               "overall"=> array("correct"=>$result[0][0]+$result[0][1] , "wrong"=> $result[1][0]+$result[1][1], 
               "not_attempted"=> $result[2][0]+ $result[2][1], "duplicate"=>$result[3][0]+$result[3][1],
                "marks"=>  $marksall ));
$_SESSION["result"]=$arr;
return mysqli_query($conn , $sql); 
}

function getNameByRoll($roll){
    $conn = mysqli_connect("localhost" , "root" , "" , "omrevaluator");
    $sql = "select *from students where roll=".$roll;
    $res = mysqli_query($conn , $sql);
    $data = mysqli_fetch_assoc($res);
    return $data["name"];
}
function parse_omr($result_arr , $save = false) {
     
    $roll = grab_roll($result_arr[0]);
    $secI = grab_section($result_arr[1]);
    $secII = grab_section($result_arr[2]);
    if($save){
        save_result($roll , $secI , $secII);
    }
    return array("roll"=> $roll , "secI" => $secI , "secII" => $secII);


}
function grab_roll($data){
     $roll = 0;
    $transposed = transpose($data);
   foreach($transposed as $question){
       $index = getfilled($question);
       if($index>=0){
       $roll = 10 * $roll + $index;
       }else{
           return -1;
       }
   }
   return $roll;

}
function grab_section($data){
    $answer_arr = array();
    foreach($data as $question){
        $answer = getfilled($question);
        array_push($answer_arr , $answer);
    }
    return $answer_arr;

}



function getfilled($question){
    global $threshold;
    $filled = 0;
    $i = -1;
  foreach($question as $circle){
      $i++;
      if($circle > $threshold){
          $filled++;
          $index = $i;
      }
  }
  if($filled == 1){
     return $index;
  }
  if($filled == 0){
      return -1;
  }
  if($filled >1){
      return -2;
  }
}

function transpose($array) {
    array_unshift($array, null);
    return call_user_func_array('array_map', $array);
}


function toString($arr){
    return implode("/" , $arr);
}
function toArray($str) {
    return explode("/" , $str);
}

function getResult($secI , $secII) {
    $answr_arr = getAnswerfromDB();
    $correct = array(0,0);
    $wrong = array(0,0);
    $double_attempted = array(0,0);
    $not_attempted = array(0,0);
   for($i=0; $i<40; $i++){
         if($i>19){
             $user_ans = $secII[$i-20];
             $sec = 1;
         }else{
             $user_ans = $secI[$i];
             $sec = 0;
         }

         if($user_ans == $answr_arr[$i]){
            $correct[$sec] +=1;   
         }else if($user_ans == -1){
              $not_attempted[$sec] +=1;
         }else if($user_ans == -2){
             $double_attempted[$sec] += 1;
         }else{
              $wrong[$sec] += 1;
         }
           
   }
   return array($correct , $wrong , $not_attempted , $double_attempted);
}
function getAnswerfromDB(){
    $conn = mysqli_connect("localhost" , "root" , "" , "omrevaluator");
    $sql = "select * from answers";
    $ans_array = array();
    $result = mysqli_query($conn , $sql);
    while($data = mysqli_fetch_assoc($result)){
        array_push($ans_array , $data["answer"]);

    }
    return $ans_array;
}

?>