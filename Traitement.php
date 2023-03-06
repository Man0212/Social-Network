<?php
    include('connexion.php');
    $date=date('y-m-d',strtotime($_GET['date']));
    $ajout="INSERT INTO Membres (Email,MotDePasse,Nom,DateNaissance) VALUES ('%s','%s','%s','%s')";
    $add=sprintf($ajout,$_GET['mail'],$_GET['pass'],$_GET['nom'],$date);


    if($_GET['mail']=='' || $_GET['pass']=='' || $_GET['nom']=='' || $date=='')
    {
        
    }else{mysqli_query($bdd,$add);}
    header('location:index.php');
?>


