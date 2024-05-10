<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username === "mootazmansouri@gmail.com" && $password === "12345678") {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username; 
            $_SESSION['password'] = $password; 
            header('Location: Acceuil.php'); 
            exit;
        } else {
            $_SESSION['error_message'] = "Nom d'utilisateur ou mot de passe incorrect.";
            header('Location: login.php'); 
            exit;
        }        
    } else {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs du formulaire.";
        header('Location: login.php');
        exit;
    }
} else {
    header('Location: login.php'); 
    exit;
}
?>
