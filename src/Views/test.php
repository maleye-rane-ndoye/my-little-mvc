<?php
ob_start();

?>

<div class="text-primary bg-secondary">
    the content  
    <span class="text-4xl underline font-bold text-rose-600">Hello World</span>

    <div class="Box"></div>

</spqn>

<?php
$content = ob_get_clean();
$title = "my title";
require_once "template.php";
?>