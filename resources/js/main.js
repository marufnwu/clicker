const btn = document.querySelector(".mobile-menu-btn")
const menu = document.querySelector(".mobile-menu")

btn.addEventListener("click", function () {
    console.log(menu);
    menu.classList.toggle("hidden")
})

