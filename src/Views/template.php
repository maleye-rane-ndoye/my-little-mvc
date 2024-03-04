<?php
$templateData = array(
    'userLoggedIn' => $userLoggedIn
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>shop</title>

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" />

</head>
<body>


        <nav class='nav'>
            <div class='md:hidden w-full text-sm flex flex-row justify-around'>

                <div class="md:hidden flex flex-col ">

                    <!-- Categories (for small screens) -->
                    <button id="toggleCategories" class="block">
                        <span class="material-icons-round">menu</span>
                    </button>
                    <div id="categoriesDropdown" class="hidden">
                        <a href=''>Vetements</a>
                        <a href=''>Meubles</a>
                        <a href=''>Informatique</a>
                        <a href=''>Jouets</a>
                        <a href=''>Electro-Ménager</a>
                        <a href=''>Decoration</a>
                    </div>
                </div>

                <div> Wentaire</div>
                <div>
                    <a href='' class="material-icons-round">add</a>
                </div>
                <div> 
                    <input type="text" placeholder= 'Recherche'>
                </div>
                <div>
                    <a href='' class="material-icons-round">chat</a>
                </div>
                <div> 
                    <a href='' class="material-icons-round">person</a>
                </div>
            </div>

            <div class='dashboard'>
            <a href="/B2/my-little-mvc/shop">Wentaire</a>
            <div class="Post">
                <span class="material-icons-round">add</span>
                <span> Post New Announce</span>
            </div>
            <div> 
                <input type="text" placeholder= 'Recherche'>
            </div>
            <?php if ($userLoggedIn): ?>
                <!-- Afficher "Message" si l'utilisateur est connecté -->
                <a class="dashboard-elem">
                    <span class="material-icons-round text-gray-500">message</span>
                    <p>Message</p>
                </a>
                <!-- Afficher "Profil" si l'utilisateur est connecté -->
                <a href="/B2/my-little-mvc/profile" class="dashboard-elem">
                    <span class="material-icons-round text-gray-500">person</span>
                    <p>Profil</p>
                </a>
            <?php else: ?>
                <!-- Afficher "Se connecter" si l'utilisateur n'est pas connecté -->
                <a href="/B2/my-little-mvc/login" class="dashboard-elem">
                    <span class="material-icons-round text-gray-500">person</span>
                    <p>Se connecter</p>
                </a>
            <?php endif; ?>
             </div>
            
            
            <!-- Categories (for medium screens and larger) -->
            <div class='underdashboard'>
                <a href=''>Vetements</a>
                <a href=''>Meubles</a>
                <a href=''>Informatique</a>
                <a href=''>Jouets</a>
                <a href=''>Electro-Ménager</a>
                <a href=''>Decoration</a>
            </div>
        </nav>
        <?= $title ?>
        <?= $content ?>

        <script src="https://fonts.googleapis.com/icon?family=Material+Icons+Round"></script>
        <script src="/B2/my-little-mvc/public/js/hambergerHandler.js"></script>

</body>
</html> 