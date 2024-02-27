// Récupérer les champs de mot de passe
var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");

// Fonction de validation du formulaire
function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Les mots de passe ne correspondent pas");
    } else {
        confirm_password.setCustomValidity('');
    }
}

// Ajouter un écouteur d'événement pour vérifier le mot de passe lors de la saisie
password.addEventListener("change", validatePassword);
confirm_password.addEventListener("keyup", validatePassword);
