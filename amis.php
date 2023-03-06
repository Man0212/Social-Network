<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\Style_amis.css">
    <title>Document</title>
</head>
<div class="all">
<body>
<div class="menu">
    <a href="index.php"><img src="Discord.png" width='150px'></a>
</div>
<?php
$bdd=mysqli_connect('localhost','root','root','data');
            session_start();
            $amis2="SELECT Membres.* FROM Amis JOIN Membres ON Amis.id = Membres.id where Amis.id2='%s' and statut='OUI';";
            $id2=sprintf($amis2,$_SESSION['id']);
            $resultat=mysqli_query($bdd,$id2); 
            while($donnees = mysqli_fetch_assoc($resultat)){ ?>
            

<div class="ensemble">
<div class="image"><img src="Profil\<?php echo $donnees['Nom']; ?>.png" width='100px'></div>

<div class="nom">
    <p class='N'><?php echo $donnees['Nom']; ?></p>
    <p class='E'><?php echo $donnees['Email']; ?></p>
</div>


<div class='retirer'>
       <a href="retirer.php?val=<?php echo $donnees['id']; ?>">
       <button>
           retirer
       </button>
       </a>
</div> 


<div class='profil'>
       <a href="profil.php?val=<?php echo $donnees['id']; ?>">
       <button type='submit'>
           <p>Visiter profil</p>
       </button>
       </a>
</div> 
</div>


          <?php  } ?>
</body>
</div>
</html>

