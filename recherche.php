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
if(!isset($_GET['test'])){$_GET['test']=$_SESSION['test'];}
$_SESSION['test']=$_GET['test'];
$recherche="select *from Membres where Nom LIKE '%s%s%s'";
$recherche=sprintf($recherche,'%',$_SESSION['test'],'%');
$resulte = mysqli_query($bdd,$recherche);
?>

               
    <?php  while($donnes = mysqli_fetch_assoc($resulte)) { ?>
                   

    <div class="ensemble">

        <div class="image">
        <img src="Profil\<?php echo $donnes['Nom']; ?>.png" width='80px'>
        </div>       
                    
        <div class="nom" >
        <p class='N'><?php echo $donnes['Nom']; ?></p>
    <p class='E'><?php echo $donnes['Email']; ?></p>
        </div>
                                                        
        <div class="retirer">
        <?php
        $del="select*from Membres where Nom='%s'";
        $id=sprintf($del,$donnes['Nom']);
        $result = mysqli_query($bdd,$id); 
        $donnees = mysqli_fetch_array($result);
        $id2=$donnees[0];

                $amis2="select statut from Amis where id2='%s' and id='%s' or id2='%s' and id='%s'";
                $id1=sprintf($amis2,$_SESSION['id'],$id2,$id2,$_SESSION['id']);
                $resultat=mysqli_query($bdd,$id1); 
                $A=mysqli_fetch_array($resultat);
               
            if($A[0]=='OUI' || $_SESSION['id']==$id2 )
            { ?>
                <div class='profil'>
<a href="profil.php?val=<?php echo $donnees['id']; ?>">
<button type='submit'>
<p>Visiter profil</p>
</button>
</a>
</div> 
                <?php }
else{ ?>
                <a href="ajouter.php?val=<?php echo $donnes['Nom']; ?>"><button>Ajouter</button></a>        
                <?php } ?> 
                </div> 


                
                </div>                                                                
            <?php } ?>
</body>
</div>
</html>

