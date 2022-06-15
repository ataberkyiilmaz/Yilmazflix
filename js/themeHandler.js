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