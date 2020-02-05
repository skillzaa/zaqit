let clockSpan = document.getElementById('clockSpan');


function clock(){
let timeNow = parseInt(new Date().getTime() / 1000);
let remainingMin = (endTime - timeNow)/60;
if(remainingMin <= 0 ){
    formSubmit();
    over=true;
}
clockSpan.innerHTML = `<h3>Remaining : ${parseFloat(remainingMin).toFixed(2)} Minutes</h3>`;
}
