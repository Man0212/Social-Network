<?php
$bdd=mysqli_connect('localhost','root','root','data');
session_start();
$_SESSION['id'];

$delete="DELETE FROM amis WHERE id='%s' AND id2='%s'";
$id=sprintf($delete,$_GET['val'],$_SESSION['id']);
$result = mysqli_query($bdd,$id); 

$delete="DELETE FROM amis WHERE id2='%s' AND id='%s'";
$id=sprintf($delete,$_GET['val'],$_SESSION['id']);
$result = mysqli_query($bdd,$id); 
 header('location:amis.php');
?>

