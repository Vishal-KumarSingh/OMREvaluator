
<style>
   #mymodal , #mymodal2 {
       /* display: none;*/
        position: absolute;
        right: 20%;
        left: 20%;
        width: 60%;
        top: -100%;
        box-shadow: 30px 10px 10px 10px gray;
        background-image: linear-gradient();
        filter: initial;
        z-index: 12;
        overflow: scroll ;
        background-color: white;
    }
    #mymodal {
      display: none;
    }
    @media (max-width:800px){ 

       #mymodal{
          display: none !important;
       }
}
    .modal-body{
        position: relative;
    }
    #detail {
          color: brown;
    
    }
    .scoreTable{
      padding: 10px;
    }
    .btncenter {
      width: 50%;
      
    }
    #secImarks, #secIImarks, #allmarks{
      color: green;
      font-weight: bolder;
    }
    .score_header{
      color:#F44336;
      font-weight:bolder;
    }
    .field{
      font-size: larger ;
      color: green;
      width: 50%;
    
    }
</style>

<div id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel" style="color:#F44336;font-weight:bolder">Score Card</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="dismiss_alert()">
          <span aria-hidden="true" style="color:#F44336;font-weight:bolder">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
                 <div id="detail">
                  <label class="field">Name:- 
                <div id="detail-group-name" style="float:right; padding-right:200px;">Raj Sinha</div> </label>
                <label class="field" style="float:right;">Roll:-
                <div id="detail-group-roll" style="float:right; padding-right:200px;">123</div> 
                </label>
                 </div>
               <table width="100%" cellpadding="8" class="scoreTable">
                 <tr>
                   <td class="score_header">Subject</td>
                   <td class="score_header">Not Attempted</td>
                   <td class="score_header">Correct</td>
                   <td class="score_header">Incorrect</td>
                   <td class="score_header">Duplicate</td>
                   <td class="score_header">Marks</td>
                   
                 </tr>
                 <tr>
                   <td>Section I</td>
                   <td><div id="secInotattempted"> </div></td>
                   <td><div id="secIcorrect"></div></td>
                   <td><div id="secIwrong"></div> </td>
                   <td><div id="secIduplicate"> </div></td>
                   <td><div id="secImarks"> </div></td>
                   
                 </tr>
                 <tr>
                   <td>Section II</td>
                   <td><div id="secIInotattempted"> </div></td>
                   <td><div id="secIIcorrect"></div></td>
                   <td><div id="secIIwrong"></div> </td>
                   <td><div id="secIIduplicate"> </div></td>
                   <td><div id="secIImarks"> </div></td>
                   
                 </tr>
                 <tr>
                   <td><b>Overall</b> </td>
                   <td><div id="allnotattempted"> </div></td>
                   <td><div id="allcorrect"></div></td>
                   <td><div id="allwrong"></div> </td>
                   <td><div id="allduplicate"> </div></td>
                   <td><div id="allmarks"> </div></td>
                   
                 </tr>
                
                 <tr>
                   <td colspan="6"><button class="btncenter" style="background:#F44336;margin: 0 25%; color:white;"  onclick="dismiss_alert()">Hide</button></td>

                   
                 </tr>
               </table>
  </div>
</div>







