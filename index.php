<?php
  if($bdd=mysqli_connect('localhost','root','root','data'))
    {
       // echo 'CONNEXION REUSSI' ;
    }
    else{
        echo 'erreur';
    }
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']!='' && isset($_SESSION['mdp']) ){header('location:Publication.php');}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css\Style_connection.css">
</head>
<div class='ensemble'>
    <body >
    <div class='connection'>
        <div class='formulaire'>
            <div class='intro3'>
                <center>
                <p id='intro'>Ha, te revoila !</p>
                <p id='intro2'>Nous sommes si heureux de te revoir !</p>
                </center>
</div>                 
                <div class='intro4'>
                    <form action="connection.php" method="post">
                        <p>NOM D'UTILISATEUR</p> 
                        <input type="text" name="user">
                        <p>MOT DE PASSE</p>
                        <input type="password" name="MDP">
                        <p><input type="submit" value="Se Connecter" id='submit'></p>
                        <p>Besoin d'un compte ? <a href="page.php">S'inscrire</a></p>
                    </form>
                </div>
                </div>

            

            <div class='logo'>
                <img src="84456546284.png" width="250px">
                <center id='im'>
                    <p>IMAGINE UN</p>
                    <p>ENDROIT...</p>
                </center>
                <br>
                <p>…où tu pourrais faire partie d'un club scolaire</p> 
                <p>, d'un groupe ou d'une communauté d'art</p>
                <p> internationale. Un endroit où toi et  ta bande </p>
                <p> d'amis pouvez simplement passer du temps  </p>
            <p>ensemble. </p>
            </div>
        </div>     

     </body>
     </div>
</html>

