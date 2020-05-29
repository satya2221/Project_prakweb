function triggerClick(){
    document.querySelector('#foto').click();
}
function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#fotoprofil').setAttribute('scr',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}