<?php
ob_start();
?>
<div >    

        <a href="/B2/my-little-mvc/register">Sign up</a>
        <a href="/B2/my-little-mvc/login">Sign in</a>
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