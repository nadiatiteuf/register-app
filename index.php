<?php
$conn = mysqli_connect('localhost', 'root', '', 'participants');

if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['email'])){
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];

    echo $nom;

    $sql = "INSERT INTO participant (nom, prenom, telephone, email) VALUES ('$nom', '$prenom', '$telephone', '$email')";

    if (!mysqli_query($conn, $sql)) {
        echo "Erreur lors de l'enregistrement du participant.";
    } else {
        echo "Participant enregistré avec succès : ";
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement des participants</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
        <form method="POST" action="index.php">

        <h1>Enregistrement des participants</h1>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="telephone">Numéro de téléphone :</label>
        <input type="text" id="telephone" name="telephone" required><br><br>

        <label for="email">Adresse email :</label>
        <input type="text" id="email" name="email" required><br><br>

        <input type="submit" value="Enregistrer">
    </form>
    <form method="GET" action="participants.php" id="liste-form">
        <input type="submit" value="Voir la liste">
    </form>

    
</body>
</html>
