




<script src="js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>


  <script>
    var modal = document.getElementById("mymodal");
    var height = 30;
    var width = 30;
//adding listener to navigtion
var sidebar = document.getElementById("sidebar");
sidebar.addEventListener('click', function(e) {
    e = e || window.event;
    var target = e.target || e.srcElement,
        text = target.innerHTML;
        console.log(text);
        loadpage(text);   
}, false);



//One in all function  for every ajax request
function getdata(pageURL , data , callback){
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      callback(this.responseText);
    }
  };
  xhttp.open("POST", pageURL);
  xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded" );
  
  xhttp.send(data);
}
//loads the page demanded by the user
function loadpage(text) {
  getdata("pageprovider/getpage.php" , "request="+text , function(text){document.getElementById("page").innerHTML =text;});
  
}

function save_answers(){
  //putting all the values in a string
  var text="";
  for(var i=1;i<=40;i++){
     var option = document.getElementsByName("secI"+i);
     console.log(option);
     for(var j=0;j<4;j++){
          var value = option[j].checked;
          if(value){
            text += " "+j;
            console.log( i + " answer " + j);
            break;
          }
     } 
  }
  getdata("api/save_answers.php" , "answers="+text , function(){})
}

function save(id){
  var name = document.getElementById("name"+id).value;
  var roll = document.getElementById("roll"+id).value;
  getdata("api/alter_user.php" , "name="+name+"&id="+id+"&roll="+roll , function(text){alert(text);});
}
function deleter(id){
  getdata("api/delete_user.php" , "id="+id , function(text){alert(text);});
}
function deleter(id){
  getdata("api/delete_user.php" , "id="+id , function(text){alert(text);});
}
function update_manager(){
  getdata("api/get_update.php" , "", function(text){show_alert_dialog(text);});
}
      
       setInterval(update_manager , 3000 );
     
   function show_alert_dialog(text){
    
     if(text != ""){
      modal.style.display="block";
       console.log(text);
       obj = JSON.parse(text);
       if(obj.roll == -1){ 
         alert_to_scan_properly();
         return;
       }
       animateValue("mymodal", -100, 10, 100, false);
       document.getElementById("detail-group-name").innerHTML= obj.name;
       document.getElementById("detail-group-roll").innerHTML= obj.roll;
        animateValue("secIcorrect", -1, obj.secI.correct, 1000);
        animateValue("secIwrong", -1, obj.secI.wrong, 1000);
        animateValue("secInotattempted", -1, obj.secI.not_attempted, 1000);
         animateValue("secIduplicate", -1, obj.secI.duplicate, 1000);
         animateValue("secImarks", -1,obj.secI.marks, 1000);
       animateValue("secIIcorrect", -1, obj.secII.correct, 1000);
       animateValue("secIIwrong", -1, obj.secII.wrong, 1000);
       animateValue("secIInotattempted", -1,  obj.secII.not_attempted, 1000);
        animateValue("secIIduplicate", -1, obj.secII.duplicate, 1000);
        animateValue("secIImarks", -1, obj.secII.marks, 1000);
       animateValue("allcorrect", -1,  obj.overall.correct, 1000);
       animateValue("allwrong", -1,  obj.overall.wrong, 1000);
       animateValue("allnotattempted", -1, obj.overall.not_attempted, 1000);
      animateValue("allduplicate", -1, obj.overall.duplicate, 1000);
      animateValue("allmarks", -1, obj.overall.marks, 1000);
       //modal.style.display = "block";
  
     }
    }

   function dismiss_alert(){
    document.getElementById("mymodal2").style.display="none";
    animateValue("mymodal", -10, -100, 100, false);
    setTimeout(function(){modal.style.display="none";}, 1000);
    
   }
  function alert_to_scan_properly(){
    document.getElementById("mymodal2").style.display="block";
    animateValue("mymodal2", -100, 10, 100, false);
    console.log("Roll not found");

   }

    function animateValue(id, start, end, duration, type=true) {
    if (start === end) return;
    var range = end - start;
    var current = start;
    var increment = end > start? 1 : -1;
    var stepTime = Math.abs(Math.floor(duration / range));
    var obj = document.getElementById(id);
    var timer = setInterval(function() {
        current += increment;
        
        if(type)
        obj.innerHTML = current;
         else
         obj.style.top=current+"%";
        if (current == end) {
            clearInterval(timer);
                 }
    }, stepTime);
}

//animateValue("iii", 100, 25, 1000);
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

var str='{"name":"Akash","roll":111,"secI":{"correct":10,"wrong":10,"not_attempted":19,"duplicate":10},"secII":{"correct":10,"wrong":10,"not_attempted":20,"duplicate":10},"overall":{"correct":15,"wrong":10,"not_attempted":39,"duplicate":20}}';
//show_alert_dialog(str);
function viewOMRmodel(id){
  document.getElementById("modal01").style.display="block";
  getdata("api/get_omr_detail.php" , "id="+id, function(text){document.getElementById("omr_content").innerHTML=text;});
}
//viewOMRmodel();
  </script>
</html>
