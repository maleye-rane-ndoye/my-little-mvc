<?php
require_once (dirname(__FILE__) . '/../config/session_manager.php');
ob_start()
?>
<div>
    the profile datas
    <?= var_dump ($_SESSION);?>
</div>


<?php
$content = ob_get_clean();
$title = "this is the profile page";
require_once 'template.php';