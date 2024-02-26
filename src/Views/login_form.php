<?php
// Définir le titre de la page
$title = "Connexion";

// Début du contenu de la page
ob_start();
?>

<h1>Connexion</h1>
<form action="/B2/my-little-mvc/login" method="POST">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br>
    <button type="submit">Se connecter</button>
</form>

<?php
// Fin du contenu de la page
$content = ob_get_clean();

// Inclure le template
require_once "template.php";
?>
