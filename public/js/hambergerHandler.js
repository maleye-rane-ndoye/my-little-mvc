document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggleCategories');
    const categoriesDropdown = document.getElementById('categoriesDropdown');

    // Fonction pour basculer l'affichage du menu déroulant des catégories
    function toggleDropdown() {
        categoriesDropdown.classList.toggle('hidden');
    }

    // Ajouter un écouteur d'événements au bouton de basculement
    toggleButton.addEventListener('click', toggleDropdown);
});
