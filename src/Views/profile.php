<?php
require_once(dirname(__FILE__) . '/../config/session_manager.php');
ob_start();
?>

<div>
    <h2>Profile Information</h2>
    <form id="updateUserForm" method="POST" action="/B2/my-little-mvc/update-user">
        <label for="firstname">First Name:</label>
        <input type="text" id="username" name="firstname" value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>" required><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="userlastname" name="lastname" value="<?= isset($_SESSION['userlastname']) ? $_SESSION['userlastname'] : '' ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= isset($_SESSION['usermail']) ? $_SESSION['usermail'] : '' ?>" required><br>

        <input type="submit" value="Update Profile">
    </form>
</div>


<a href="/B2/my-little-mvc/logout">Déconnexion</a>
<script src="/B2/my-little-mvc/public/js/dataUpdateReload.js"></script>

<?php
$content = ob_get_clean();
$title = "Profile Page";
require_once 'template.php';
?>
