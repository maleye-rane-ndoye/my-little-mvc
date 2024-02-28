function redirectToLogin() {
    if (!document.getElementById("registerForm")) {
        return; // Quitter la fonction si le formulaire n'est pas présent sur la page
    }
    setTimeout(function() {
        window.location.href = '/B2/my-little-mvc/login';
    }, 2000);
}

// Appeler la fonction de redirection
redirectToLogin();
