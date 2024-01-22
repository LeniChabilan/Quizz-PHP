<?php

$dico = file_get_contents("./Data/product.json");
$tableau = json_decode($dico, true);

require 'Classes/autoloader.php'; 
Autoloader::register(); 


use Form\Type\Radiobutton;
use Form\Type\Hidden;

?>



<html>
<head>
    <meta charset="UTF-8">
    <title>Page index</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Mon Tableau</h1>
    <br>
    <form action="Submit.php" method="POST">
    <?php
        foreach ($tableau as $field) {
            /**on récupère les informations sur les questions dans le Json et on les affiches */
            echo "<p>{$field['question']}</p>";
            
            foreach($field['answer'] as $reponse) {
                $className = 'Form\\Type\\'.ucfirst($field['type']);
                
                echo new $className("question".$field['id'],$field['id'],$field['question'],$field['answer'],$field['correct'],$field['score'],$reponse).PHP_EOL;
                echo '<label for='.$field['id'].'>'.$reponse.'</label>';
            }
            
            echo "<br>";
        }
        ?>
        
        <input type="submit" value="Valider">
    </form>
</body>
</html>