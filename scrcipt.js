document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector(".container");
    const registerBtn = document.querySelector(".register-btn");
    const loginBtn = document.querySelector(".login-btn");

    registerBtn.addEventListener("click", () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener("click", () => {
        container.classList.remove("active");
    });

    // Assuming you have a submit button in your form
    document.querySelector(".btn").addEventListener("click", function (event) {
        event.preventDefault(); // Prevents default form submission
        window.location.href = "table.php"; // Redirects to table.php
    });
});


