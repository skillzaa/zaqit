
//---------------------------------------

// //---------------------------------------
// function clearNSetOptions(){
// if(typeof paper[qIndex].optionSelectedByStudent == "undefined" || paper[qIndex].optionSelectedByStudent==0){
// document.getElementById("option1").checked = false;
// document.getElementById("option2").checked = false;
// document.getElementById("option3").checked = false;
// document.getElementById("option4").checked = false;
// }else{
//     document.getElementById("option1").checked = false;
//     document.getElementById("option2").checked = false;
//     document.getElementById("option3").checked = false;
//     document.getElementById("option4").checked = false;
//     //---this one was prev selected
// document.getElementById(["option"+paper[qIndex].optionSelectedByStudent]).checked = true;

// }
// }//fn

// function setOptionsValues(){
// document.getElementById("option1Value").innerText = paper[qIndex].option1;
// document.getElementById("option2Value").innerText = paper[qIndex].option2;
// document.getElementById("option3Value").innerText = paper[qIndex].option3;
// document.getElementById("option4Value").innerText = paper[qIndex].option4;
// }//fn
//----------------------------------------------------
// function getUrlVars() {
//     var vars = {};
//     var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
//         vars[key] = value;
//     });
//     return vars;
// }//fn
//--------------------------------------------------
function chqSofarNAdd2Skipped(){
    let s="";
  for (let index = 0; index < qIndexMaximum; index++) {
    if(typeof (paper[index].optionSelectedByStudent)== "undefined" || paper[index].optionSelectedByStudent==0)
    {
      s+= `<span class="skipBadge orange btn-floating btn-small waves-effect waves-light" data-questionIndex="${index}">${index+1}</span>`;
    }
  }
  document.getElementById("skippedQuestionsDiv").innerHTML = s;
  }//fn
//--------------------------------------------------
//------------------------------------------------------
function qNo(){
    return (qIndex +1);
  }
//------------------------------------------------------
function setTimer(){
let timeNow = parseInt(getTime()/1000);
let timeRemaining = "";
if(timeNow  > endTime){
  console.log("Times Up");
  clearInterval(timeKeeper);
  checkTest(paper);
}else{
  timeRemaining = parseInt(endTime-timeNow);
  let min = parseInt(timeRemaining/60);
  let sec = timeRemaining % 60;
  clockSpan.innerHTML = `<span>Min: ${min} Sec: ${sec}</span>`;
  //console.log(`Minutes: ${min} Seconds: ${sec}`);
}

}//fn
//------------------------------------------------------

