<?php
$bdd=mysqli_connect('localhost','root','root','data');
session_start();
$_SESSION['user'];
$_SESSION['id'];


$del="select*from Membres where Nom='%s'";
$id=sprintf($del,$_GET['val']);
$result = mysqli_query($bdd,$id); 
$donnees = mysqli_fetch_array($result);
 $id2=$donnees[0];


 $recherche="INSERT INTO Amis VALUES (%s,%s,NOW(),null,'NON')";
 $recherche=sprintf($recherche,$_SESSION['id'],$id2);
 mysqli_query($bdd,$recherche);




$nom="select Nom from Membres where id='%s'";
$id=sprintf($nom,$_GET['val']);
$result = mysqli_query($bdd,$id); 
$donnees = mysqli_fetch_array($result);
 $noms=$donnees[0];

 header('location:recherche.php');
?>