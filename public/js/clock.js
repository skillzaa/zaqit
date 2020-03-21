let clockSpan = document.getElementById('clockSpan');


function clock(){
if(firstTrip==true){
startTime = parseInt(new Date().getTime() / 1000);
endTime = startTime + (paper.minutes*60); //in seconds
firstTrip=false;
}    
let timeNow = parseInt(new Date().getTime() / 1000);//seconds
let remainingSeconds = (endTime -  timeNow);

let RemainingTimeInMinutes = (remainingSeconds)/60;
let sec1 = remainingSeconds - (Math.floor(RemainingTimeInMinutes)*60);
let sec =String(sec1).padStart(2, '0')

if(timeNow >=  endTime  ){
    formSubmit();
    over=true;
}
clockSpan.innerHTML = `<h3>Time :${Math.floor((remainingSeconds/60))}:${(sec)}</h3>`;
}
