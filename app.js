
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const message = document.getElementById("message");

    if (form) {
        form.addEventListener("submit", function(event) {
            event.preventDefault();

            const username = form.username.value;
            const password = form.password.value;

            if (username === "admin" && password === "admin") {
                message.textContent = "Login Successful";
                message.style.color = "green";
                sessionStorage.setItem("isLoggedIn", "true");
                setTimeout(() => {
                    window.location.href = "index.html";
                });
            } else {
                message.textContent = "Invalid username or password";
                message.style.color = "red";
            }
        });
    }
});
