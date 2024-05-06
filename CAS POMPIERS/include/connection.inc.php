<?php
$hote = "127.0.0.1:3306";
$bd = "dsc";
$login = "root";
$motDePasse ="";
$erreur = null;

try
{
    $db = new PDO("mysql:host = $hote;dbname=$bd;charset=utf8",$login,$motDePasse);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
     $error = "Erreur dans la connexion: ".$e->getMessage();
     echo "<div class='alert alert-danger'>$error</div>";
}