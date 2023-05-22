<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
.w3-bar-item{ border-radius: 15px;}
.w3-bar-item:hover { animation: centralise 0.2s ease;}
@keyframes centralise {
    0%{ padding-left: 10px; }
    100% { padding-left:15px;}
}
</style>
<body>

<div id="mymodal2" style="display:none">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel" style="color:#F44336;font-weight:bolder">Alert</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="dismiss_alert()">
          <span aria-hidden="true" style="color:#F44336;font-weight:bolder">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Your OMR was not scanned properly... This might be some reason</p>
        <ul>
          <li>Image is blurred or noisy</li>
          <li>Make sure to click neat and nice pictue</li>
          <li>Brightness level should be optimum neither much higher nor that lower</li>
        <li>Do not include other objects in the frame..</li>
        <li>Crop the picture perfectly</li>
        <li>Roll Number filled by candidate is not </li>
        </ul>
              
            
  </div>
    </div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Computer<br>Vision</b></h3>
  </div>
  <div class="w3-bar-block" id="sidebar">
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Set Answers</a> 
    <a  onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">History</a> 
    <a  onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Manage Candidates</a> 
    <a onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Scanning</a> 
    <a  onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Top 20</a>
    <a  onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Settings</a>
  </div>
</nav>
