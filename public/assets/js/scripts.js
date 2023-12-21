document.getElementById("menubar-bottom").addEventListener("click", toggleMenu);

function toggleMenu() {
    const navbar = document.getElementById("navbar-left");
    if(navbar.classList.contains("open")){
        navbar.classList.remove("open")
        document.getElementById("content-container").style.padding = '0px 0px 0px 40px'
    } else {
        navbar.classList.add("open")
        document.getElementById("content-container").style.padding = '0px 0px 0px 160px'
    }
}