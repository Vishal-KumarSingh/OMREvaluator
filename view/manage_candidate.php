<?php
include "../include/conn.php";
$sql = "select * from students";
$res = mysqli_query($conn , $sql);

?>
<table style="margin-left: 30px;" border="5" width="100%" class="table table-light row-g3">

<tr>
<td>SI No</td>
<td>Name</td>
<td>Roll No</td>
</tr>
<?php
$i=0;
while($data = mysqli_fetch_assoc($res)){
    $i++;
?>
<tr>


<td><?php echo $i;?></td>
<td> <input type="text" id="name<?php echo $data["id"]?>" value="<?php echo $data["name"]?>" ></td>
<td><input type="number" id="roll<?php echo $data["id"]?>" value="<?php echo $data["roll"]?>"></td>
<td><button class="btn" style="background:#F44336; color: white" onclick="save(<?php echo $data['id']?>)">Save</button></td>
<td><button class="btn" onclick="deleter(<?php echo $data['id']?>)">
<i class="fas fa-trash" style="color: #F44336;"></i></button></td>
</tr>  

<?php
}
?>
<tr>


<td>Add User</td>
<td> <input type="text" id="name0" value="" ></td>
<td><input type="number" id="roll0" value=""></td>
<td><button class="btn" style="background:#F44336; color: white" onclick="save(0)">Save</button></td>
<td></td>
</tr>
</table>
