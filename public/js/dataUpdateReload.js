// Envoyer la requête AJAX pour mettre à jour les informations de l'utilisateur
function updateUser() {
    // Récupérer les données du formulaire
    var formData = new FormData(document.getElementById('updateUserForm'));

    // Envoyer les données du formulaire via AJAX
    fetch('/B2/my-little-mvc/update-user', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Convertir la réponse en JSON
    .then(data => {
        if (data.success) {
            // Afficher un message de succès
            alert(data.message);
            
            // Rediriger vers la page de profil avec les nouvelles données
            window.location.href = "/B2/my-little-mvc/profile";
        } else {
            // Afficher un message d'erreur
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Erreur lors de la mise à jour des informations :', error);
    });
}
