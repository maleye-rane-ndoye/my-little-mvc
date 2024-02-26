document.addEventListener("DOMContentLoaded", function() {
    // Récupérer le formulaire d'inscription par son ID
    var registerForm = document.getElementById("registerForm");

    // Écouter l'événement de soumission du formulaire
    registerForm.addEventListener("submit", function(event) {
        // Empêcher le comportement par défaut du formulaire (rechargement de la page)
        event.preventDefault();

        // Effectuer une action après la soumission du formulaire
        setTimeout(function() {
            window.location.href = '/B2/my-little-mvc/login';
        }, 2000);
    });
});
