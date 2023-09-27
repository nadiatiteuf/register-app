<?php
$conn = mysqli_connect('localhost', 'root', '', 'participants');

if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

$sql = "SELECT * FROM participant";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des participants</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Liste des participants</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nom"] . "</td>";
                echo "<td>" . $row["prenom"] . "</td>";
                echo "<td>" . $row["telephone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Aucun participant enregistré.";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
