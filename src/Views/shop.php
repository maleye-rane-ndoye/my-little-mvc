<?php

require_once(dirname(__FILE__) . '/../config/session_manager.php');

ob_start();

?>
               
 <a href="/B2/my-little-mvc/logout">Déconnexion</a>


<div id="userWelcomeMessage">
    <?php echo 'Bienvenue, ' . $username; ?>
</div>
<div >
        
        <?php
        // Afficher les produits
        echo "<h2>Produits :</h2>";
        foreach ($products as $product) {
                echo "<pre>";
                print_r($product);
                echo "</pre>";}
                ?>
</div>

<?php
$title = " thid is all products";
$content = ob_get_clean();
require_once "template.php";
?>