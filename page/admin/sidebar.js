const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
document.querySelector("#sidebar").classList.toggle("expand");
});

// JavaScript to add active class to selected menu item
let sidebarLinks = document.querySelectorAll(".sidebar-link");

sidebarLinks.forEach((link) => {
    link.addEventListener("click", function () {
        sidebarLinks.forEach((item) => item.classList.remove("active"));
        this.classList.add("active");
    });
});