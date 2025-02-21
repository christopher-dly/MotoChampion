const burger = document.getElementById("burger");
const menu = document.getElementById("menu");
const overlay = document.getElementById("overlay");
const navLinks = document.querySelectorAll(".navbar-links a");

burger.addEventListener("click", () => {
    menu.classList.toggle("active");
    overlay.classList.toggle("active");
});

overlay.addEventListener("click", () => {
    menu.classList.remove("active");
    overlay.classList.remove("active");
});

navLinks.forEach(link => {
    link.addEventListener("click", () => {
        menu.classList.remove("active");
        overlay.classList.remove("active");
    });
});
