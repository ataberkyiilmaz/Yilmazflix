if (localStorage.darkMode) {
    navbar.classList.add("dark-mode");
    document.body.classList.add("dark-mode");
    themeMoon.classList.add("dark-moon");

}

function darkMode() {
    var element = document.body;
    var navbar = document.getElementById("navbar");
    var themeMoon = document.getElementById("themeMoon");



    if (navbar.classList.contains("dark-mode")) {
        navbar.classList.remove("dark-mode");
        document.body.classList.remove("dark-mode");
        themeMoon.classList.remove("dark-moon");
        localStorage.darkMode = false;

    } else {
        navbar.classList.add("dark-mode");
        document.body.classList.add("dark-mode");
        themeMoon.classList.add("dark-moon");
        localStorage.darkMode = true;
    }
}

function responsiveNavbar() {
    var x = document.getElementById("navbar");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }

    if (x.className === "navbar_left") {
        x.className += " responsive";
    } else {
        x.className = "navbar_left";
    }

    if (x.className === "navbar_right") {
        x.className += " responsive";
    } else {
        x.className = "navbar_right";
    }
    if (x.className === "navbar_mid") {
        x.className += " responsive";
    } else {
        x.className = "navbar_mid";
    }
}