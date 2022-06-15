const rmCheck = document.getElementById("rememberMe");

if (rmCheck) {
    const emailInput = document.getElementById("email");
    if (localStorage.checkbox && localStorage.checkbox !== "") {
        rmCheck.setAttribute("checked", "checked");
        emailInput.value = localStorage.username;
    } else {
        rmCheck.removeAttribute("checked");
        emailInput.value = "";
    }
    rmCheck.onchange = lsRememberMe;
}

function lsRememberMe() {
    if (rmCheck.checked && emailInput.value !== "") {
        localStorage.username = emailInput.value;
        localStorage.checkbox = rmCheck.value;;
    } else {
        localStorage.username = "";
        localStorage.checkbox = "";
    }
}