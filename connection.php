<?php
session_start();


$bdd=mysqli_connect('localhost','root','root','data');


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Erreur</title>
    <link rel="stylesheet" href="css\Style_erreur.css">
</head>
<div class='ensemble'>
    <body>
        <?php $donnes = mysqli_query($bdd,'select*from Membres');
        for($i=0;$i<1000;$i++)
        {
            $data = mysqli_fetch_assoc($donnes);
            
            if($_POST['user']!='' && $data['Nom']==$_POST['user'] && $data['MotDePasse']==$_POST['MDP'] && $_POST['MDP']!='')
            {
                header('location:Publication.php');
                $_SESSION['user']=$_POST['user'];
                $_SESSION['mdp']=$_POST['MDP'];
            }   
         } 
        ?>
        <div class="texte">
            <center>
                <div class="all">
            <p>Nom D'utilisateur ou Mot de Passe incorrect</p>
            <form action="index.php">
                <button type="submit"><h3>Reessayer</h3></button>
            </form>
            <form action="page.php">
                <button type="submit"><h3>Creer un compte</h3></button>
            </form>
            </div>
            </center>
        </div>
    </body>
</div>
</html>




