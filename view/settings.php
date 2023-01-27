<?php
session_start();
?>

<form class="row g-3" method="post" action="index.php">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Marks for positive answer Sec I</label>
    <input type="number" class="form-control" id="inputEmail4" name="pmarkI" value="<?php echo $_SESSION["pmarkI"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Marks for positive answer Sec II</label>
    <input type="number" class="form-control" id="inputEmail4" name="pmarkII" value="<?php echo $_SESSION["pmarkII"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Marks for negative answer Sec I</label>
    <input type="number" class="form-control" id="inputPassword4"  name="nmarkI"  value="<?php echo $_SESSION["nmarkI"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Marks for negative answer Sec II</label>
    <input type="number" class="form-control" id="inputPassword4"  name="nmarkII"  value="<?php echo $_SESSION["nmarkII"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Marks for double answer Sec I</label>
    <input type="number" class="form-control" id="inputPassword4"  name="dmarkI"  value="<?php echo $_SESSION["dmarkI"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Marks for double answer Sec II</label>
    <input type="number" class="form-control" id="inputPassword4"  name="dmarkII"  value="<?php echo $_SESSION["dmarkII"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Marks for not attempted answer Sec I</label>
    <input type="number" class="form-control" id="inputPassword4"  name="markI"  value="<?php echo $_SESSION["markI"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Marks for not atttempted answer Sec II</label>
    <input type="number" class="form-control" id="inputPassword4"  name="markII"  value="<?php echo $_SESSION["markII"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Passing Marks for Sec I</label>
    <input type="number" class="form-control" id="inputPassword4"  name="minmarkI"  value="<?php echo $_SESSION["minmarkI"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Passing Marks for Sec II</label>
    <input type="number" class="form-control" id="inputPassword4"  name="minmarkII"  value="<?php echo $_SESSION["minmarkII"];?>"><br>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Scanning Threshold</label>
    <input type="number" class="form-control" id="inputCity" name="threshold"  value="<?php echo $_SESSION["threshold"];?>"><br>
  </div>

  <div class="col-12">
    <button type="submit" class="btn" style="background: #F44336; color: white;">Save Settings</button>
  </div>
</form>