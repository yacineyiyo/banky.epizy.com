var slideStatus = true;
function menu_func(){
   if (slideStatus == true) {
       document.getElementById("menu").style.display = "block";
       slideStatus = false;
   } else {
       document.getElementById("menu").style.display = "none";
       slideStatus = true;
   }
}
