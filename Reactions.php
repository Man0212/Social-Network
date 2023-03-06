<?php
session_start();
include('connexion.php');
include('Fonctions.php');
echo $_POST['reaction'];
echo $_GET['TXT'];
echo $_GET['NOM'];
echo $_GET['IDP'];
echo $_GET['IDA'];

reaction($_POST['reaction'],$_SESSION['id'],$_GET['IDP']);

?>