<?php
ob_start();

?>

<div class ="">
    the content  
</div>

<?php
$content = ob_get_clean();
$title = "my title";
require_once "template.php";
?>