const menuIcon = document.getElementById("menuIcon");
const menu = document.getElementById("menu");

function hideMenu(){
    console.log("clicked icon");
    if(menu.className === "menu" ){
        menu.className += " visible";
    }else{
        menu.className = "menu";
    }
}