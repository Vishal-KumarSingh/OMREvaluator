
<!DOCTYPE html>
<html lang="en">
<title>OMR Evaluator</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Computer<br>Vision</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">FAQ</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Login</a> 
    <a href="#packages" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">How To Use</a> 
    <a href="#designers" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">About</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">&#9776;</a>
  <span>Computer Vision</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>OMR Evaluator</b></h1>
   
  </div>
  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Home</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>we are excited to introduce the omr evaluation web app.</p>
    <p>
        The OMR is a very common means of examination and it is easily available at different level.
        There are lot of OMR evaluator machines available in the marked but they are expensive right !! 
        It is impossible to buy such machines just to check few dozens of OMR papers right.
        That's why we are introducing OMR Evaluator Software that is capable not only to evaluate the OMRs 
        but also to manage results.

    </p>
  </div>
  <!-- Services -->
  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>About</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>This OMR evaluator is designed to simplify the work of manual OMR evaluation.</p>
    <p>
       The user needs to upload the picture of OMR clicked neatly and leave the rest on us,
       The software is designed to evaluate the OMR by using Computer Vision.
       The user friendly dashboard is designed to give awesome user experiences while navigating to different services.
       OMR Evaluator is capable of monitoring student records in their OMR based examinations also provides an easy 
       to use by teacher and to prepare the results

    </p>
  </div>


  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Benefits</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>You will benefied in a lot of manners. Some of them are listed below</p>
    <p>
      <ul>
         <li>Time Saving :- It saves your time by computerized your work</li>
         <li>Easy to Use :- the User friendly is designed to get introduced by itself without any efforts.</li>
         <li>Make Changes on Runtime:- You can change your answer set any time you desired</li>
         <li>Reliability:- The OMR evaluator is reliable and safe to use by providing maximum efficiency</li>
         <li>No Loss of data:- You data remains saved in the cloud. No need of worry of carrying papers</li>
         
      </ul>
    </p>
  </div>
  
  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Safety Measures</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>There are some safety measures too that one should keep in mind while using this Web App</p>
    <p>
      <ul>
         <li>Make sure to click neat and nice pictue</li>
         <li>Brightness level should be optimum neither much higher nor that lower</li>
         <li>Do not include other objects in the frame..</li>
         <li>Crop the picture perfectly </li>
         
         
      </ul>
    </p>
  </div>

  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Technologies</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>There are lot of technologies used in this web App</p>
    <p>
       <ul>
         <li>Web Front End (HTML,CSS,JS,JQUERY, W3CSS , BOOTSTRAP)</li>
         <li>Backend (PHP, MySQl)</li>
         <li>Computer Vision (Python , OpenCV , Numpy )</li>
       </ul>

    </p>
  </div>

  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Purpose</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>This Web App is designed as a project of <b>Katihar Engineering College Katihar</b></p>
   
  </div>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>