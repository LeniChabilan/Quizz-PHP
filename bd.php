<?php

date_default_timezone_set('Europe/Paris');
try{
  // le fichier de BD s'appellera contacts.sqlite3
  $file_db=new PDO('sqlite:bd.sqlite3');
  $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
  $file_db->exec("CREATE TABLE IF NOT EXISTS score ( 
    username TEXT PRIMARY KEY,
    score INTEGER)");

  $scores=array(
    array('username' => 'Leni',
      'score' => 'NULL'),
    array('username' => 'Antoine',
      'score' => 'NULL'),
    array('username' => 'Liam',
      'score' => 'NULL'));

    $insert="INSERT INTO score (username,score) VALUES (:username, :score)";
  $stmt=$file_db->prepare($insert);
  // on lie les parametres aux variables
  $stmt->bindParam(':username',$username);
  $stmt->bindParam(':score',$score);

  foreach ($scores as $c){
    $username=$c['username'];
    $score=$c['score'];
    $stmt->execute();
  }
  
  echo "Insertion en base reussie !";

  $result=$file_db->query('SELECT * from score');
  foreach ($result as $m){
    echo "<br/>\n".$m['username'].' '.$m['score'];
  }
  // on ferme la connexion
  $file_db=null;



}catch(PDOException $ex){
    echo $ex->getMessage();
}
?>