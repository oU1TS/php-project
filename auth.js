
document.addEventListener("DOMContentLoaded", function() {
    const authButton = document.getElementById("authButton");
    const authText = document.getElementById("authText");

    if (authButton && authText) {
        if (sessionStorage.getItem("isLoggedIn") === "true") {
            authText.textContent = "Sign Out";
            authButton.href = "#";
        }

        authButton.addEventListener("click", function(event) {
            if (authText.textContent === "Sign Out") {
                event.preventDefault();
                sessionStorage.setItem("isLoggedIn", "false");
                authText.textContent = "Sign In";
                authButton.href = "./login-page.html";
            }
        });
    }
});
