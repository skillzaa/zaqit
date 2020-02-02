//-----------------Globals
let paper = "";let timeKeeper="";let startTime = "";let endTime="";let totalTimeAllowed=""; let qIndex = 0;let qIndexMaximum=0; let maxLength =0;let skipped =[];
let finishBtn = document.getElementById("finish");
let clockSpan = document.getElementById("clockSpan");
finishBtn.style.display="none";
let ready =false;
//.................................
(function(){
  let q = getUrlVars();
  let qq = q.q;
  if(typeof qq === "undefined" || qq.length < 8){
 alert("The Test does not exist or could not be retrieved");
  }
  //-----------------axios-----------------------
  axios.post('./api/getTest.php', {
    data: qq
  })
  .then((response) => {
   if(response.data.success==true){
    paper = response.data['papers'];
    maxLength = paper.length;
    totalTimeAllowed = response.data['totalTimeAllowed'];
        if(totalTimeAllowed !== 0){
        startTime = parseInt(getTime()/1000);
        endTime = parseInt(startTime + (totalTimeAllowed*60));
        timeKeeper = setInterval(setTimer, 1000);
        }  
  setInterval(gameLoop, 500);
   }else{
     alert(response.data.msg);
   } 
    
});  


})();
//................................
let back = document.getElementById("back");
let next = document.getElementById("next");
let skip = document.getElementById("skip");

skip.addEventListener("click",function(){
paper[qIndex].optionSelectedByStudent = 0;  
  clearOptions();
});
//-------------------------------------------  
back.addEventListener("click",function(){
//--------------------------------------------
if(qIndex > 0){
  qIndex = qIndex-1; 
  finishBtn.style.display="none";
  next.style.display="inline-block";
}
});

next.addEventListener("click",function(){
  //console.log("ooptionSelected",paper[qIndex].optionSelectedByStudent);

if(qIndex > maxLength-2){
  // finishBtn.style.display="inline-block";
  // next.style.display="none";
  }else{
    qIndex = qIndex+1;
    // finishBtn.style.display="none";
    // next.style.display="inline-block";
        if(qIndex>qIndexMaximum){
          qIndexMaximum = qIndex;
        }  
}

});  


finishBtn.addEventListener("click",function(){
//-----------------------------
//-----------------axios-----------------------
//let qq = {}
axios.post('./api/reduceTestsAllowed.php', {
  data: {}
})
.then((response) => {
////
});  

//-----------------------------  
checkTest(paper);
});  
//.................................
document.addEventListener('click', function (e) {
var t = e.target;  
  if (t.classList.contains('skipBadge')) {
let questionIndex = (t.getAttribute("data-questionIndex"));
qIndex = parseInt(questionIndex);
  }//if
});
//=================================================
//==============GAME LOOP==========================
//=================================================
function gameLoop(){
if(typeof paper[qIndex].question === "undefined"){return;}  
document.getElementById("textScreen").innerText = paper[qIndex].question;//
document.getElementById("totalQuestions").innerText = `Question No: ${qNo()} of ${maxLength}`;//just display +1 since the index=0;
//-------------------------------------
if(qIndex > maxLength-2){
  finishBtn.style.display="inline-block";
  next.style.display="none";
  }else{
    finishBtn.style.display="none";
    next.style.display="inline-block";
}
//----------------------------------------
clearNSetOptions();
setOptionsValues(); 
chqSofarNAdd2Skipped(); 
}//fn
//==================================================
//==================================================