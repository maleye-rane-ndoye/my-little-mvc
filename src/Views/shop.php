<?php
ob_start();

?>

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
$content = ob_get_clean();
$title = " thid is all products";
require_once "template.php";
?>