<?php
session_id("admin");
session_start();
$_SESSION["result"] = "hahah";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Image</title>
</head>
<body>
    <form action="evaluateOMR.php" method="post" enctype="multipart/form-data">

   <input type="file" name="myfile">
   <input type="submit" value="Scan" class="form-group">
</form>
</body>
</html>