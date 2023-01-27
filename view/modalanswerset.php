<?php
include "../include/conn.php";
$sql = "select * from answers";
$res = mysqli_query($conn , $sql);

?>

<style>
    @media(min-width:800px) {
        .left {
         float: left;
         width: 40%;
    }
    .right {
        float: right;
        width: 40%;
    }
    .save{
       background:#F44336; 
       color: white; 
       position:absolute; 
       bottom: -1400px;
    }
    }
    .save{
       background:#F44336; 
       color: white; 
    }
    .question {
        width: 300px;
       /* border: 5px solid brown;*/
    }
    .option {
        margin: 10px 30px;
        
        font-weight: bolder;
    }
    input[type='radio']:checked {
         background-color: #F44336;
         border-color: #F44336;
    }
</style>

  
<?php
for($j=0;$j<2;$j++){
?>
<div class="col-md-6  <?php echo ($j==0)?"left":"right"; ?>">
<div id='heading'><h2>Section <?php echo ($j==0)?"I":"II"; ?></h2> </div>
<?php
for($i=1;$i<=20;$i++){
    $data = mysqli_fetch_assoc($res);

    ?>
<div class="input-group mb-3 question">
        <h4 class="m-4"><?php echo $i; ?></h4>
      <div class="option"> <input type="radio" class="form-check-input"  name="<?php echo "secI".($j*20+$i); ?>" <?php echo ($data["answer"]==0)?"checked":"";  ?>></input><br>A</div> 
      <div class="option"> <input type="radio" class="form-check-input"  name="<?php echo "secI".($j*20+$i); ?>" <?php echo ($data["answer"]==1)?"checked":"";  ?>></input><br>B</div> 
      <div class="option"><input type="radio" class="form-check-input"  name="<?php echo "secI".($j*20+$i); ?>" <?php echo ($data["answer"]==2)?"checked":"";  ?>></input><br>C</div> 
      <div class="option"><input type="radio" class="form-check-input"  name="<?php echo "secI".($j*20+$i); ?>" <?php echo ($data["answer"]==3)?"checked":"";  ?>></input><br>D</div> 
    </div>

    
    <?php } 

    echo "</div>";
   }
    ?>


<button class="btn save" onclick="save_answers()">Save</button>
    
