
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
//  console.log("Times Up");
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

