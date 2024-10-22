<?php
// Configuration de la connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Requête d'insertion des données dans la base de données
    $sql = "INSERT INTO formulaire (name, email, subject, message)
    VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="sent-message">Votre message a été envoyé avec succès et enregistré dans la base de données. Merci!</div>';
    } else {
        echo '<div class="error-message">Une erreur s\'est produite lors de l\'envoi et de l\'enregistrement du message. Veuillez réessayer plus tard.</div>';
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
