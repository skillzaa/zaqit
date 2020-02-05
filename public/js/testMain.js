//-----------------Globals-----
let over = false;
let paper = "";
let questions = "";
let startTime = "";// parseInt(new Date().getTime() / 1000);
let endTime="";
let minutes="";
let qIndex = 0;
//let qIndexMaximum=0;
let noOfQs =0;
let skipped =[];
//..............Elements
let finishBtn = document.getElementById("finish");
//let clockSpan = document.getElementById("clockSpan");
let title = document.getElementById("title");
let skippedDiv = document.getElementById("skippedDiv");
let questionDiv = document.getElementById("questionDiv");

let option1 = document.getElementById("option1");
let option2 = document.getElementById("option2");
let option3 = document.getElementById("option3");
let option4 = document.getElementById("option4");
//========================================
//========================================
window.addEventListener('DOMContentLoaded', (event) => {
//finishBtn.style.display="none";
//get questions into global var
questions = JSON.parse(document.getElementById("questions").value);
//get papaer
paper = JSON.parse(document.getElementById("paper").value);
noOfQs = questions.length;
//converted from mili sec to sec due to /1000
startTime = parseInt(new Date().getTime() / 1000);
minutes = paper.minutes;
endTime = startTime + (minutes*60);
setInterval(gameloop,500);
//option2.checked = true;
});///=======init ended
document.getElementById("back").addEventListener('click',function(){
if(autoSkip()){skip()};
(qIndex > 0)? qIndex-- : qIndex;
});
document.getElementById("next").addEventListener('click',function(){
if(autoSkip()){skip()};
(qIndex < (noOfQs-1) )? qIndex++ : qIndex;
});
document.getElementById("skip").addEventListener('click',function(){
skip();
});
document.getElementById("finish").addEventListener('click',formSubmit);
//=====================================---
//.................................
document.addEventListener('click', function (e) {
    var t = e.target;
      if (t.classList.contains('optionRadio')) {
          option1.clicked=false;
          option2.clicked=false;
          option3.clicked=false;
          option4.clicked=false;
        let radioNo = (t.getAttribute("data-radioNo"));
        questions[qIndex]['optionSelected'] = radioNo;
      }//if
});
//-------------------------------------------
//===========================================
//.................................
document.addEventListener('click', function (e) {
var t = e.target;
  if (t.classList.contains('skipBadge')) {
    let item = (t.getAttribute("data-questionIndex"));
    console.log(item);
    unSkip(item);
  }//if
});

//================================
function gameloop(){
if(over==false){
    loadQdata();
    setOptionValuesAndSpans();
    setOldValues();
    clock();
}

}
//================================
