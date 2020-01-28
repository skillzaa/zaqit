window.onload = function WindowLoad(event) {
    let hideLink = document.getElementById('hideLink');
    let hide = document.getElementById('hide');
    hide.style.display="none";

    hideLink.addEventListener("click", function(){
        let hide = document.getElementById('hide');
if(hide.style.display == "none"){
   hide.style.display = "block"
}else if (hide.style.display== "block") {
   hide.style.display = "none"}
   });



}
