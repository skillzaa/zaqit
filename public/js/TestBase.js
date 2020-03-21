export default class TestBase{
constructor(){
    
}    
 loadQdata(){
questionDiv.innerText = questions[qIndex]['question'];
title.innerText = "Question No : " + (parseInt(qIndex)+1) + " of " + noOfQs;
}
//----------------------------------
 setOptionValuesAndSpans(){
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
//.................................
document.addEventListener('click',  (e) {
    var t = e.target;
      if (t.classList.contains('skipBadge')) {
    let questionIndex = (t.getAttribute("data-questionIndex"));
    //console.log(questionIndex);
    qIndex = parseInt(questionIndex);
    }//if
    });
//===========================================
 setOldValues(){
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
 skip(){
if(!skipped.includes(qIndex)){
            option1.checked=false;
            option2.checked=false;
            option3.checked=false;
            option4.checked=false;
    skipped.push(qIndex);
    skipped = skipped.sort((a, b) => a - b);
    questions[qIndex]['optionSelected'] = null;
    let txt = "";
    skipped.forEach((item){
        txt += `<span class='skipBadge' data-questionIndex="${item}">${parseInt(item)+1}</span>`;
    });
    skippedDiv.innerHTML = txt;
}
}

 unSkip($incomming){
//reduce one digit
$qNo = parseInt($incomming);
const newSkipped = [];
    skipped.forEach(elm => {
        if(elm != parseInt($qNo)){
            newSkipped.push(elm);
        }
    });
skipped = newSkipped.sort((a, b) => a - b);

console.log("New",newSkipped);
console.log("skipped",skipped);
skippedToSpans();
}
//++++++++++++++++++++++++++++++++++++++++++
 autoSkip(){
if( option1.checked==false
    && option2.checked==false
    && option3.checked==false
    && option4.checked==false
    ){
return true;
    }
return false;
}//autoSkip
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 skippedToSpans(){
    let txt="";
    skipped.forEach((item){
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
        
}
