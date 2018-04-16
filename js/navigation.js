function myFunction() {
    var x = document.querySelector('.menu-toggle');
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}