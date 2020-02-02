function checkTest(paper){
  let subjSingleList = reduceSubject(paper);
  let final = totalQuestionPerSubject(subjSingleList,paper);
  //console.log("subjSingleList",subjSingleList);
  //console.log("final",final);
  let finalWithMarks = getSubjectMarks(subjSingleList,final,paper);
  //console.log("finalWithMarks",finalWithMarks);
  //------start pre data for ReportCard
  var s = `
  <h1 class="align-center valign-wrapper">Report Card</h1>
  <table class="">
  <tr> <td>Subject</td><td class="green-text">Correct</td><td class="red-text">Wrong</td><td>%age</td></tr>`;
  finalWithMarks.map(f=>{
  f.wrongAnswers = f.totalNoOfQuestion - f.correctAnswers;
  f.percentage = ((f.correctAnswers/f.totalNoOfQuestion)*100);
  s+= `<tr> <td>${(f.subject).toUpperCase()}</td><td class="green-text">${f.correctAnswers}</td><td class="red-text">${f.wrongAnswers}</td><td>${f.percentage}</td></tr>`
  });
  
  s+=`<b><tr> <td><b>Total</b></td><td>${aooSumCol(finalWithMarks,"correctAnswers")}</td><td class="red-text">${aooSumCol(finalWithMarks,"wrongAnswers")}</td><td>${parseInt(aooSumCol(finalWithMarks,"percentage")/subjSingleList.length)}%</td></tr></b>`;
  s+=`</table>`;
  s+=`<p class="pad blue-grey lighten-1 white-text"><b>Your final Percentage is ${parseInt(aooSumCol(finalWithMarks,"percentage")/subjSingleList.length)}%</b>`;
  //-----------------------------------------
  //-----------------------------------------
  let d = "<hr/>";
  // question red/gree correct option your option
      paper.map((p,index)=>{
        let correctOption = p["option"+p.correctOption];
        let tf = p.optionSelectedByStudent ==p.correctOption ? true : false; 
        let cls= tf==true? "card green-text lighten-5" : "card red-text"; 
        d+= `<div class="${cls} pad">Question: ${p.question}</div>`;
        d+= `<div><b>Correct Answer</b>: ${correctOption}
        <b>Your Answer</b>:${p["option"+p.optionSelectedByStudent]}</div>`;
      });  
  //---------------------------------------------------
  document.getElementById("testDiv").style.display ="none"; 
  document.getElementById("reportCard").innerHTML =(s+d);     
  //---------------------------------------------------    
  }//fn  
//------------------------------------------------------
function aooSumCol(aoo,col){
  var total=0;  
    aoo.map(a=>{
    total += a[col];  
    });  
  return total;
  }
//------------------------------------------------------
function getSubjectMarks(subjSingleList,final,paper){
  //find correct questions for each subject  
  final.map(f =>{
  let marks = 0;
      paper.map((p)=>{
          if(p.subject == f.subject){
              if(p.correctOption == p.optionSelectedByStudent){
                marks++;
              }
          }     
      });
  f.correctAnswers = marks;    
  });
  return final;
  }//fn  
//------------------------------------------------------
function totalQuestionPerSubject(subjSingleList,paper){
  var r = [];  
  subjSingleList.forEach(elm => {
  let obj = {}; obj.subject = elm;
  let item = paper.filter(p=>p.subject == elm);  
  obj.totalNoOfQuestion = item.length;
  r.push(obj);
  });
  return r;
  }//fn
  
//------------------------------------------------------
function reduceSubject(paper){
  let subjSingleList = [];
paper.map((p)=>{
  if(!subjSingleList.includes(p.subject)){
    subjSingleList.push(p.subject);
  }
});
return subjSingleList;
}//fn
