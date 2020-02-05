function checkTest(questions){
  let subjSingleList = reduceSubject(questions);
  let final = totalQuestionPerSubject(subjSingleList,questions);
  let finalWithMarks = getSubjectMarks(final,questions);
//   console.log("finalWithMarks",finalWithMarks);
//   console.log("subjSingleList",subjSingleList);
//   console.log("final",final);
  return finalWithMarks;
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
function getSubjectMarks(final,questions){
  //find correct questions for each subject
  final.map(f =>{
  let marks = 0;
      questions.map((p)=>{
          if(p.subject_id == f.subject_id){
              if(p.correctOption == p.optionSelected){
                marks++;
              }
          }
      });
  f.correctAnswers = marks;
  });
  return final;
  }//fn
//------------------------------------------------------
function totalQuestionPerSubject(subjSingleList,questions){
  var r = [];
  subjSingleList.forEach(elm => {
  let obj = {}; obj.subject_id = elm;
  let item = questions.filter(p=>p.subject_id == elm);
  obj.totalNoOfQuestion = item.length;
  r.push(obj);
  });
  return r;
  }//fn

//------------------------------------------------------
function reduceSubject(questions){
  let subjSingleList = [];
  questions.map((p)=>{
  if(!subjSingleList.includes(p.subject_id)){
    subjSingleList.push(p.subject_id);
  }
});
return subjSingleList;
}//fn
