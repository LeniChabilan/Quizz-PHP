<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $score = $_POST["score"];

    date_default_timezone_set('Europe/Paris');
    try {
        // le fichier de BD s'appellera contacts.sqlite3
        $file_db = new PDO('sqlite:bd.sqlite3');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $file_db->exec("CREATE TABLE IF NOT EXISTS score ( 
            username TEXT PRIMARY KEY,
            score INTEGER)");

        // Utilisez REPLACE INTO au lieu de INSERT INTO pour éviter l'erreur de contrainte UNIQUE
        $replace = "REPLACE INTO score (username, score) VALUES (:username, :score)";
        $stmt = $file_db->prepare($replace);

        // Affiche les valeurs avant l'exécution
        echo "Username: $username, Score: $score";

        // on lie les paramètres aux variables
        $stmt->bindParam(':username', $username);

        // Utilisez directement la valeur de $score
        $stmt->bindValue(':score', $score, PDO::PARAM_INT);

        // exécute la requête
        $stmt->execute();

        echo "Insertion en base réussie !";

        // Affiche les résultats de la base de données
        $result = $file_db->query('SELECT * FROM score');
        foreach ($result as $m) {
            echo "<br/>\n" . $m['username'] . ' ' . $m['score'];
        }

        // on ferme la connexion
        $file_db = null;
    } catch (PDOException $ex) {
        echo "Erreur : " . $ex->getMessage();
    }
} else {
    echo "Le formulaire n'a pas été soumis correctement.";
}
?>
