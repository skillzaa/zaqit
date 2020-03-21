//-----------------Globals-----
let over = false;
let paper = "";
let questions = "";
let startTime = "";// parseInt(new Date().getTime() / 1000);
let endTime="";
let minutes="";
let allowedTimeInSeconds="";
let firstTrip = true;
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
let attemptsRemaining = document.getElementById("attemptsRemaining");

let option1 = document.getElementById("option1");
let option2 = document.getElementById("option2");
let option3 = document.getElementById("option3");
let option4 = document.getElementById("option4");
//========================================
//========================================
window.addEventListener('DOMContentLoaded', (event) => {
finishBtn.style.display="none";
//get questions into global var
questions = JSON.parse(document.getElementById("questions").value);
//get papaer
paper = JSON.parse(document.getElementById("paper").value);
noOfQs = questions.length;
//converted from mili sec to sec due to /1000

setInterval(gameloop,1000);
});///=======init ended

document.getElementById("back").addEventListener('click',function(){
  if(isQuestionAttempted()===true){
    removeFromSkipped(qIndex);
  }else{
    skip();
  }  
//..............................
if(autoSkip()){skip()};
(qIndex > 0)? qIndex-- : qIndex;
//hide finish button
finishBtn.style.display="none";
});
document.getElementById("next").addEventListener('click',function(){
//if the question is among skipped and is attempted now should be removed from skipped--if it is not attmepted then shd be skipped
if(isQuestionAttempted()===true){
  removeFromSkipped(qIndex);
}else{
  skip();
}  
//..............................
(qIndex < (noOfQs-1) )? qIndex++ : qIndex;
if(qIndex >= (noOfQs-1)){
  finishBtn.style.display="inline-block";
}
});
document.getElementById("skip").addEventListener('click',function(){
  skip();
  /**with every skip move forward */
  (qIndex < (noOfQs-1) )? qIndex++ : qIndex;
 
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
//--------------------CLICKING SKIP BADGE
document.addEventListener('click', function (e) {
var t = e.target;
if (t.classList.contains('skipBadge')) {
let questionIndex = (t.getAttribute("data-questionIndex"));
  if(isQuestionAttempted()===true){
    removeFromSkipped(qIndex);
  }
 
qIndex = parseInt(questionIndex);
}//if
});
//===========================================

//===========================================
//.................................
// document.addEventListener('click', function (e) {
// var t = e.target;
//   if (t.classList.contains('skipBadge')) {
//     let item = (t.getAttribute("data-questionIndex"));
//     //console.log(item);
//     //unSkip(item);
//     console.log('skip clicked :');
//   }//if
// });

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
// console.log('attemptsRemaining :', attemptsRemaining.value);
document.getElementById('attemptsRemainingDiv').innerHTML=`Remaining Test Attempts: ${attemptsRemaining.value}`; 