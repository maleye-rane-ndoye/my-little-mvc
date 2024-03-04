<?php

namespace App\Controllers;

use App\Models\User;

class UserController {

    public function register() {
        $userLoggedIn = isset($_SESSION['user_id']);

        // Vérifier si le formulaire d'inscription a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Vérifier si les mots de passe correspondent
        if ($password !== $confirm_password) {
            // Afficher un message d'erreur si les mots de passe ne correspondent pas
            echo "Les mots de passe ne correspondent pas.";
            return; // Arrêter l'exécution du script
        }

            // Créer une instance du modèle User
            $userModel = new User();


                // Vérifier si l'email existe déjà
            if ($userModel->emailExists($email)) {
                // Afficher un message d'erreur
                echo "Cet email est déjà utilisé. Veuillez en choisir un autre.";
                return; // Arrêter l'exécution de la méthode
            }

            // Appeler la méthode register du modèle User pour tenter l'inscription
            $success = $userModel->register($firstname, $lastname, $email, $password);

            if ($success) {
                // Afficher un message de succès (le script JS gère la redirection)
                echo "<p>Inscription réussie ! Vous allez être redirigé vers la page de connexion.</p>";
                // Appeler la fonction de redirection après 2 secondes
            echo '<script>setTimeout(() => { window.location.href = "/B2/my-little-mvc/login"; }, 2000);</script>';
            } else {
                // Afficher un message d'erreur
                echo "Une erreur s'est produite lors de l'inscription.";
            }
        } else {
            // Afficher le formulaire d'inscription
            include(dirname(__FILE__) . '/../Views/register_form.php');
        }
    }

    public function login() {
        
        $userLoggedIn = isset($_SESSION['user_id']);

        // Vérifier si le formulaire de connexion a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Créer une instance du modèle User
            $userModel = new User();
    
            // Appeler la méthode login du modèle User pour tenter la connexion
            $user = $userModel->login($email, $password);
    
            if ($user) {
                session_start();
                // Stocker des informations sur la session de l'utilisateur
                $_SESSION['user_id'] = $user['id'];
                if(isset($user['firstname'])) $_SESSION['username'] = $user['firstname'];
                if(isset($user['lastname'])) $_SESSION['userlastname'] = $user['lastname'];
                if(isset($user['email'])) $_SESSION['usermail'] = $user['email'];
                if(isset($user['password'])) $_SESSION['userpassword'] = $user['password'];
                // Rediriger vers une page sécurisée
                header("Location: /B2/my-little-mvc/shop");
                exit();
            } else {
                // Afficher un message d'erreur
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            // Afficher le formulaire de connexion
            include(dirname(__FILE__) . '/../Views/login_form.php');
        }
    }


    public function logout() {
        // Détruisez la session
        session_destroy();
        // Redirigez l'utilisateur vers la page de connexion ou une autre page
        header("Location: /B2/my-little-mvc/login");
        exit();
    }
    


    



    public function updateUser() {
        $userLoggedIn = isset($_SESSION['user_id']);
        // Vérifier si le formulaire de mise à jour a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();

            // Récupérer les données du formulaire
            $userId = $_SESSION['user_id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
    
            // Validation des données
            if (empty($firstname) || empty($lastname) || empty($email)) {
                // Afficher un message d'erreur si des champs sont vides
                echo "Veuillez remplir tous les champs.";
                return;
            }
    
            // Créer une instance du modèle User
            $userModel = new User();
    
            // Appeler la méthode updateUser du modèle User pour mettre à jour les informations de l'utilisateur
            $success = $userModel->updateUser($userId, $firstname, $lastname, $email);
    
            if ($success) {
                // Afficher un message de succès
                echo "Informations mises à jour avec succès.";
                echo '<script>setTimeout(() => { window.location.href = "/B2/my-little-mvc/profile"; }, 2000);</script>';

            } else {
                // Afficher un message d'erreur
                echo "Une erreur s'est produite lors de la mise à jour des informations.";
            }
        } else {
            // Afficher le formulaire de mise à jour
            include(dirname(__FILE__) . '/../Views/profile.php');
        }
    }
    

    
}
