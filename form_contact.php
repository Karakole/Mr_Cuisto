<?php
 
ini_set('display_errors','on');
error_reporting(E_ALL);
   
//var_dump($_POST);

// Les données en provenance du formulaire
$nomfamille = $_POST["nomfamille"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$telfixe = $_POST["telfixe"];
$telmobile = $_POST["telmobile"];
$adresse = $_POST["adresse"];
$messagecontact =$_POST["messagecontact"];

// Paramètres de connexion

$db="mr_cuisto";
$dbhost="localhost";
$dbuser="colin@localhost";
$dbpasswd="123456";

//Connexion avec PHP

$pdo = new PDO('mysql:host='.$dbhost.';dbname='.$db.'', $dbuser, $dbpasswd,[]);

//Requête SQL

$sql = "INSERT INTO contact(nomfamille,prenom,email,telfixe,telmobile,adresse,messagecontact) VALUES (:nomfamille, :prenom, :email, :telfixe, :telmobile, :adresse, :messagecontact)";  

//Envoi de la requête 

try { 

$stmt = $pdo-> prepare ($sql);
$stmt ->bindParam(':nomfamille', $nomfamille);
$stmt ->bindParam(':prenom', $prenom);
$stmt ->bindParam(':email', $email);
$stmt ->bindParam(':telfixe', $telfixe);
$stmt ->bindParam(':telmobile', $telmobile);
$stmt ->bindParam(':adresse', $adresse);
$stmt ->bindParam(':messagecontact', $messagecontact);
$stmt->execute();

echo "Le transfert des données vers la base est un succès";

}
catch(PDOException $e) {
echo "Echec de l'opération".$e->getMessage();
}

$stmt = null;

