<?php
// Définir le titre de la page
$title = "Formulaire d'inscription";

// Début du contenu de la page
ob_start();
?>

<h1>Inscription</h1>
<form id="registerForm" action="/B2/my-little-mvc/register" method="POST">
    <label for="firstname">Prénom :</label>
    <input type="text" id="firstname" name="firstname" required><br>
    <label for="lastname">Nom :</label>
    <input type="text" id="lastname" name="lastname" required><br>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br>
    <button type="submit">S'inscrire</button>
</form>
<script src="/B2/my-little-mvc/public/js/redirect.js"></script>
<?php
// Fin du contenu de la page
$content = ob_get_clean();

// Inclure le template
require_once "template.php";
?>
