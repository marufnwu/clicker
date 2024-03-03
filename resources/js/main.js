const btn = document.querySelector(".mobile-menu-btn")
const menu = document.querySelector(".mobile-menu")

btn.addEventListener("click", function () {
    console.log(menu);
    menu.classList.toggle("hidden")
})

document.addEventListener("DOMContentLoaded", function() {
    const eyeOpen = document.getElementById("eyeOpen");
    const eyeOpenConfirm = document.getElementById("eyeOpenConfirm");
    const eyeClose = document.getElementById("eyeClose");
    const eyeCloseConfirm = document.getElementById("eyeCloseConfirm");
    const passwordInput = document.getElementById("password");
    const passwordInputConfirm = document.getElementById("passwordConfirm");

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

    eyeOpenConfirm.addEventListener("click", function() {
        passwordInputConfirm.type = "text";
        eyeOpenConfirm.classList.add("hidden");
        eyeCloseConfirm.classList.remove("hidden");
    });

    eyeCloseConfirm.addEventListener("click", function() {
        passwordInputConfirm.type = "password";
        eyeOpenConfirm.classList.remove("hidden");
        eyeCloseConfirm.classList.add("hidden");
    });

});
document.addEventListener("DOMContentLoaded", function() {
    const confirmEyeOpen = document.getElementById("confirmEyeOpen");
    const confirmEyeClose = document.getElementById("confirmEyeClose");
    const confirmPasswordInput = document.getElementById("password_confirmation");

    confirmEyeOpen.addEventListener("click", function() {
        confirmPasswordInput.type = "text";
        confirmEyeOpen.classList.add("hidden");
        confirmEyeClose.classList.remove("hidden");
    });

    confirmEyeClose.addEventListener("click", function() {
        confirmPasswordInput.type = "password";
        confirmEyeOpen.classList.remove("hidden");
        confirmEyeClose.classList.add("hidden");
    });
});




