<?php
session_start();

include "../include/conn.php";
$sql = "select * from merit_list join students on merit_list.roll=students.roll";
$res = mysqli_query($conn , $sql);

?>
<style>
    .merit_list td {
        text-align: center;
    }
  
</style>
<table  border="5" class="table table-light g-3" class="merit_list">

<tr>
<td rowspan="2">Rank</td>
<td rowspan="2">Name</td>
<td rowspan="2">Roll</td>
<td colspan="3" rowspan="1" align="center">Sec I</td>
<td colspan="3" rowspan="1" align="center">Sec II</td>
<td colspan="3" rowspan="1" align="center">OverAll</td>
<td rowspan="2">Operation</td>
</tr>
<tr>
<td>Correct</td>
<td>Incorrect</td>
<td>Marks</td>
<td>Correct</td>
<td>Incorrect</td>
<td>Marks</td>
<td>Correct</td>
<td>Incorrect</td>
<td>Marks</td>

</tr>
<?php
$i=0;
include "../lib/OMR_DS.php";
$sorted = array();
while($data = mysqli_fetch_assoc($res)){ 
    
    
    $result = getResult(toArray($data["secI"]) , toArray($data["secII"]));
    $marks1 = $result[0][0]*$_SESSION["pmarkI"] + $result[1][0]*$_SESSION["nmarkI"] + $result[2][0]*$_SESSION["markI"]    +       $result[3][0]*$_SESSION["dmarkI"];
    $marks2 =$result[0][1]*$_SESSION["pmarkII"] + $result[1][1]*$_SESSION["nmarkII"] + $result[2][1]*$_SESSION["markII"] +         $result[3][1]*$_SESSION["dmarkII"];
    $marksall =$marks1+$marks2;
    //print_r($info);
    
    array_push($sorted , array("info"=>$data,"result"=>$result, "marks"=>array($marks1,$marks2) , "overall"=>$marksall));

}
$tot_marks = array_column($sorted, 'overall');
array_multisort($tot_marks , SORT_DESC , $sorted);
foreach($sorted as $result){
    $i++;

?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $result["info"]["name"]?></td>
<td><?php echo $result["info"]["roll"]?>
</td>
<td><?php echo $result["result"][0][0]?></td>
<td><?php echo $result["result"][1][0]?></td>
<td style="font-weight:bolder; color: <?php echo ($result["marks"][0]>$_SESSION["minmarkI"])?"green":"red"; ?>"><?php echo $result["marks"][0] ?></td>
<td><?php echo $result["result"][0][1]?></td>
<td><?php echo $result["result"][1][1]?></td>
<td style="font-weight:bolder; color: <?php echo ($result["marks"][1]>$_SESSION["minmarkII"])?"green":"red"; ?>"><?php echo $result["marks"][1] ?></td>
<td><?php echo $result["result"][0][0]+$result["result"][0][1]?></td>
<td><?php echo $result["result"][1][0]+$result["result"][1][1];?></td>
<td style="font-weight:bolder; color: <?php echo ($result["overall"]>($_SESSION["minmarkI"]+$_SESSION["minmarkII"]))?"green":"red"; ?>"><?php echo $result["overall"];?></td>

<td><button class="btn" style="background:#F44336; color: white" onclick="viewOMRmodel(<?php echo $result["info"]["ids"]; ?>)">View</button></td>
<td><button class="btn" onclick=""><i class="fas fa-trash" style="color:red;"></i></button></td>  
</tr>

<?php
}
?>

</table>