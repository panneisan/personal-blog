window.onscroll = function () {
    myFunction();
}
var navbar = document.getElementById("navbar");
var topHeight = navbar.offsetTop;
console.log(topHeight);
function myFunction() {
    if (window.pageYOffset >= topHeight){
        navbar.classList.add("fix-nav");
    }else {
        navbar.classList.remove("fix-nav");
    }
}
var navList = document.getElementById("nav-list");
var navItem = navList.getElementsByClassName("nav-item");
for (var i = 0; i < navItem.length; i++) {
    navItem[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}