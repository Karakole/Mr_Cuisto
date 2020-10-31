<?php
 
ini_set('display_errors','on');
error_reporting(E_ALL);
   
//var_dump($_POST);

// Les données en provenance du formulaire
$nom = $_POST["nom"];
$email = $_POST["email"];
$messagelivredor =$_POST["messagelivredor"];

// Paramètres de connexion

$db="mr_cuisto";
$dbhost="localhost";
$dbuser="colin@localhost";
$dbpasswd="123456";

//Connexion avec PHP

$pdo = new PDO('mysql:host='.$dbhost.';dbname='.$db.'', $dbuser, $dbpasswd,[]);

//Requête SQL

$sql = "INSERT INTO livredor(nom,email,messagelivredor) VALUES (:nom, :email, :messagelivredor)";  

//Envoi de la requête 

try { 

$stmt = $pdo-> prepare ($sql);
$stmt ->bindParam(':nom', $nom);
$stmt ->bindParam(':email', $email);
$stmt ->bindParam(':messagelivredor', $messagelivredor);
$stmt->execute();

echo "Le transfert des données vers la base est un succès";

}
catch(PDOException $e) {
echo "Echec de l'opération".$e->getMessage();
}

$stmt = null;

