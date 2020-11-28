<?php
 
$title=$_POST['title'];
$start=$_POST['start'];
$end=$_POST['end'];
$ressource=$_POST['ressource'];
$idutilisateur=$_POST['idutilisateur'];
// connexion à la base de données
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=stagepme', 'root', '');
 } catch(Exception $e) {
 exit('Impossible de se connecter à la base de données.');
 }
 
$sql = "INSERT INTO evenement (title, start, end, ressource, idutilisateur) VALUES (:title, :start, :end, :ressource, :idutilisateur)";
$q = $bdd->prepare($sql);
$q->execute(array(':title'=>$title, ':start'=>$start, ':end'=>$end, ':ressource'=>$ressource, ':idutilisateur'=>$idutilisateur));
?>