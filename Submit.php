<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
</head>
<body>
    <h1>Résultats du Formulaire</h1>

    <?php
    $dico = file_get_contents("./Data/product.json");
    $tableau = json_decode($dico, true);
    $listeRep= array();
    $listeScore=array();
    foreach ($tableau as $tab) {
        array_push($listeRep,$tab['correct']);
        array_push($listeScore,$tab['score']);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Réponses soumises :</h2>";
        echo "<ul>";
        $ind=0;
        $score=0;
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'question') !== false) {
                $questionId = str_replace('question', '', $key);
                echo "<li>Question $questionId : $value</li>";

                if($value==$listeRep[$ind]){
                    $score+=$listeScore[$ind];
                    
                }
            }
            $ind+=1;
        }

        echo "</ul>";
        echo "<ul>";
        $indi=1;
        foreach ($listeRep as $reponse) {
            echo "<li>Reponse correcte à la question $indi : $reponse";
            $indi+=1;
        }

        echo "</ul>";
        echo "<h2>Votre score est : ".$score."</h2>";
        echo "<p>Enregistrez votre score : </p>";
        echo "<form action='bd.php' method='POST'>";
        echo '<label for="username">Entrez votre nom : </label>';
        echo "<input type='text' requiered placeholder='Votre nom' name='username' id='username'/>";
        echo '<label for="score">Votre score est : </label>';
        echo "<input type='number' requiered value=".$score." name='score' id='score' readonly/>";
        echo '<input type="submit" value="Valider">';
        echo '</form>';
        
    } else {
        echo "<p>Le formulaire n'a pas été soumis correctement.</p>";
    }
    ?>

</body>
</html>