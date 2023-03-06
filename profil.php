
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\Style_profil.css">
    <title>Document</title>
</head>
<div class="all">
<body>
<div class="menu">
    <a href="index.php"><img src="Discord.png" width='150px'></a>
</div>
<?php
session_start();
 if(!isset($_GET['val'])){$_GET['val']=$_SESSION['id'];}
$bdd=mysqli_connect('localhost','root','root','data');


 
$del="select*from Membres where id='%s'";
$id=sprintf($del,$_GET['val']);
$result = mysqli_query($bdd,$id); 
while($donnees = mysqli_fetch_assoc($result)) { ?>

<div class="ensemble">
<div class="fond">

</div>
<div class="image"><img src="Profil\<?php echo $donnees['Nom']; ?>.png" width='200px'></div>

<div class="nom">
    <p class='N'><?php echo $donnees['Nom']; ?></p>
    <p class='E'><?php echo $donnees['Email']; ?></p>
</div>

</div> 
<?php } ?>
</body>
</div>
</html>
