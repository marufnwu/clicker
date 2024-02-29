const btn = document.querySelector(".mobile-menu-btn")
const menu = document.querySelector(".mobile-menu")

btn.addEventListener("click", function () {
    console.log(menu);
    menu.classList.toggle("hidden")
})

document.addEventListener("DOMContentLoaded", function() {
    const eyeOpen = document.getElementById("eyeOpen");
    const eyeClose = document.getElementById("eyeClose");
    const passwordInput = document.getElementById("password");

    eyeOpen.addEventListener("click", function() {
        passwordInput.type = "text";
        eyeOpen.classList.add("hidden");
        eyeClose.classList.remove("hidden");
    });

    eyeClose.addEventListener("click", function() {
        passwordInput.type = "password";
        eyeOpen.classList.remove("hidden");
        eyeClose.classList.add("hidden");
    });
});



