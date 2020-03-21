function loadQdata(){
questionDiv.innerText = questions[qIndex]['question'];
title.innerText = "Question No : " + (parseInt(qIndex)+1) + " of " + noOfQs;
}
//----------------------------------
function setOptionValuesAndSpans(){
option1Span.innerText = questions[qIndex]['option1'];
option2Span.innerText = questions[qIndex]['option2'];
option3Span.innerText = questions[qIndex]['option3'];
option4Span.innerText = questions[qIndex]['option4'];
option1.value = questions[qIndex]['option1'];
option2.value = questions[qIndex]['option2'];
option3.value = questions[qIndex]['option3'];
option4.value = questions[qIndex]['option4'];
}
//=========================================
function setOldValues(){
let oldValue = questions[qIndex]['optionSelected'];
//console.log(oldValue);
switch (oldValue) {
    case "1":
        option1.checked=true;
        break;
    case "2":
        option2.checked=true;
        break;
    case "3":
        option3.checked=true;
        break;
    case "4":
        option4.checked=true;
        break;
    default:
        option1.checked=false;
        option2.checked=false;
        option3.checked=false;
        option4.checked=false;
        break;
}
}
//------------------------------------------
function skip(){
if(!skipped.includes(qIndex)){
            option1.checked=false;
            option2.checked=false;
            option3.checked=false;
            option4.checked=false;
    skipped.push(qIndex);
    skipped = skipped.sort((a, b) => a - b);
    questions[qIndex]['optionSelected'] = null;
    let txt = "";
    skipped.forEach(function(item){
        txt += `<span class='skipBadge' data-questionIndex="${item}">${parseInt(item)+1}</span>`;
    });
    skippedDiv.innerHTML = txt;
}
/**wrong--single responsibility princicple--no more than one task / function */
// //on skip move to next question
// (qIndex < (noOfQs-1) )? qIndex++ : qIndex;
}

function unSkip($incomming){
$qNo = parseInt($incomming);
const newSkipped = [];
    skipped.forEach(elm => {
        if(elm != parseInt($qNo)){
            newSkipped.push(elm);
        }
    });
skipped = newSkipped.sort((a, b) => a - b);
skippedToSpans();
}
//++++++++++++++++++++++++++++++++++++++++++
function autoSkip(){
if( option1.checked==false
    && option2.checked==false
    && option3.checked==false
    && option4.checked==false
    ){
return true;
    }
return false;
}//autoSkip
function isQuestionAttempted(){
if( option1.checked==false
    && option2.checked==false
    && option3.checked==false
    && option4.checked==false
    ){
return false; //question is not attempted
    }
return true;
}//autoSkip
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
function skippedToSpans(){
    let txt="";
    skipped.forEach(function(item){
        txt += `<span class='skipBadge' data-questionIndex="${item}">${parseInt(item)+1}</span>`;
    });
    skippedDiv.innerHTML = txt;

}
formSubmit = (e)=>{
        //e.preventDefault();
        let result  = checkTest(questions);
        document.getElementById('out').value = JSON.stringify(result);
        document.getElementById('testForm').submit();
        //console.log(document.getElementById('questions').value);

}
function removeFromSkipped(qNo){
const newSkipped = [];
    skipped.forEach(elm => {
        if(elm != parseInt(qNo)){
            newSkipped.push(elm);
        }
    });
skipped = newSkipped.sort((a, b) => a - b);
skippedToSpans();
}