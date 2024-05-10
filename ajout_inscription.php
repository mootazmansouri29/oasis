<?php
require_once('connexion/connexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    if (!empty($_POST['full_name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['phone_number']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Check if passwords match
        if ($password === $confirm_password) {
            try {
                $sql = "INSERT INTO inscription (full_name, username, email, phone_number, password) VALUES (:full_name, :username, :email, :phone_number, :password)";
                
                $stmt = $pdo->prepare($sql); // Prepare the SQL statement

                // Bind parameters
                $stmt->bindParam(':full_name', $full_name);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone_number', $phone_number);

                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bindParam(':password', $hashed_password);
                
                $stmt->execute();

                header("Location: Acceuil.php");
                exit;
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Error: Passwords do not match";
        }
    } else {
        echo "Error: All form fields are required";
    }
} else {
    echo "Error: Form not submitted";
}
?>
