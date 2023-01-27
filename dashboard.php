

<?php include "include/header.php"; ?>
<?php //include "include/navigation.php"; ?>


<?php //include "include/sidebar.php"; ?>


    <form id="file_upload" enctype="multipart/form-data" method="POST" action="evaluateOMR.php" class="col-md-3">
    
    <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="myfile">
        
        <input class="input-group-text" type="submit" value="Upload">

    </div>
   
    
    </form>
    <?php include "include/footer.php"; ?>