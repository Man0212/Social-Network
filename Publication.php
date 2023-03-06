<?php
session_start();
include('connexion.php');
include('Fonctions.php');
 if(!isset($_POST['TextePublication'])){$_POST['TextePublication']=null;}
 if(!isset($_POST['TexteCommentaire'])){$_POST['TexteCommentaire']=null;}
 if (isset($_POST['TexteCommentaire'])) {header("Location:Publication.php");}
 if(!isset($_GET['O'])){$_GET['O']=null;}
 if(!isset($_GET['test'])){$_GET['test']='XXX';}

$del="select*from Membres where Nom='%s'";
$result=requete_id($del,$_SESSION['user']);
while($donnees = mysqli_fetch_assoc($result)) {$_SESSION['id']=$donnees['id'];}
?>

</table>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\Style_publication.css">
    <title>Document</title>
</head>
<div class='ensemble'>
<body>
        <div class='one'>           
            <div class='logo'>
            <img src="Discord.png" width='150px'>
        </div>
        <table id='tab'>
        <tr>
            <td>
            <div class='profil'>
            <img src="Profil\<?php echo $_SESSION['user']; ?>.png " width='150px'>
            </div>
            </td>
        </tr>
        </table>
<center>
<div class='nom'>
            <?php echo $_SESSION['user']; ?>
            </div>
</center>

        <div class='amis'>
<table>
<tr class='titre'>
    <td width="130px"> Publication</td>
    <td width="130px">Followers</td>
    <td>Amis</td>
</tr>
<tr class='valeur'> 
    <td>
        <p id='NP'>
        <?php echo liste_publication($_SESSION['id']);?>
        </p>
    </td>
    <td id='NF'>
        <?php if( $_SESSION['id']== 1){echo '95,2K';}else{echo 120;}?>
    </td>
    <td>     
        <p id='NA'>
<a href="amis.php"><?php echo  liste_amis($_SESSION['id']);?></a>
        </p>
    </td>
</tr>

</table>
            </div>
            <?php
    $ajout="select*from Amis where id2='%s' and statut='NON'";
    $ajout=sprintf($ajout,$_SESSION['id']);
    $resultet = mysqli_query($bdd,$ajout);
    ?>
            <div class="demande">
            <table width='350px' >
                <?php  while($donnes = mysqli_fetch_assoc($resultet)) { ?>
                    <tr>
                    <td>
                    <?php 
                    $nom="select*from Membres where id='%s'";
                    $id=sprintf($nom,$donnes['id']);
                    $result = mysqli_query($bdd,$id); 
                    while($donnees = mysqli_fetch_array($result)){?>
                    <img src="Profil\<?php echo $donnees['Nom']; ?>.png" width='40px'>
                    
                    
                    
                    </td>
                    <td>   
                    <?php echo $donnees['Nom']; ?>
                    </td>
                    <?php } ?>
                    <td>                   
                    <a href="accepter.php?val=<?php echo $donnes['id']; ?>"><button>Accepter</button></a>
                    </td>
                    </tr>                                    
               <?php } ?>
                </table>
            </div>
            <div class='list'>
            <table width='150px' >
                <tr>                    
                    <td><img src="icon\loupe.png" width="40px"></td>
                    <td><a href="recherche.php">Liste Membres</a></td>                   
                </tr>
                <tr>
                <td>                   
                    <img src="icon\profil.png" width="40px"></td>
                    <td><a href="profil.php">Profil</a></td>                   
                </tr>
                <tr>
                <td><img src="icon\tv.png" width="40px"></td>
                    <td>Discord TV</td>
                </tr>
                <tr>
                <td>                   
                    <img src="icon\amis.png" width="40px"></td>                   
                    <td><a href="amis.php">Liste d'amis</a></td>                    
                </tr>
                <tr>
                <td><img src="icon\parametre.png" width="40px"></td>
                    <td>parametre</td>
                </tr>
                <hr>
            </table>
            <hr>
<table>
<tr id='deco'>
                <td><img src="icon\deco.png" width="40px"></td>
                    <td >
                        <form action="deconnexion.php" method="get">
                        <button type="submit"> Deconnexion</button>
                        </form>
                    </td>  
                </tr>
</table>
            </div>
        </div>
        <div class='two'>
            <div class='recherche'>
<div>

    <form action="recherche.php" method="get">
        <p>
        <input type="text" name="test" id="R" value="Search...">
        <button id="S" type="submit"><img src="recherche.png" width='25px'></button>
        </p>
    </form>
</div>
<div class='deconnexion'>
    <form action="deconnexion.php" method="get">
        <button type="submit"> Deconnexion</button>
    </form>
</div>
            </div>
<br>
            <div class='storie'>
               <div class='cree'>
               <form action="publication.php" method="post">
                    <input type="text" name="TextePublication">
               </div>

               <div class='pub'>
                <select name="TypeAffichage">
                        <option>Public</option>
                        <option>Amis</option>
                    </select> 
                    <Button type="submit">
                       Publier
                   </Button>
               </div>
               </form>
            </div>
<br>
            <div class='publication'>
<?php insert_publication($_SESSION['id'],$_POST['TextePublication'],$_POST['TypeAffichage']);?>

    <div class="tout">
       <?php  
       $publication="select id_publication,Membres.Nom,DateHeurePublication,TextePublication,TypeAffichage from Publications join Membres on Membres.id=Publications.id_auteur where id_auteur IN (select id2 from amis where id='%s') or id='%s'";
       $id2=sprintf($publication,$_SESSION['id'],$_SESSION['id']);
       $R=mysqli_query($bdd,$id2);

       insert_commentaire($_GET['O'],$_SESSION['id'],$_POST['TexteCommentaire']);

       while($donnes = mysqli_fetch_assoc($R)) { 
        ?>
                <div class="publi">
               
                        <div class='M'>
                        <div class="PHOTO"><img src="Profil\<?php  echo $donnes['Nom'];  ?>.png" width='50px'></div>
                        <div class="NOMS"><?php  echo $donnes['Nom'];  ?><div class="DATE"><?php  echo $donnes['DateHeurePublication'];  ?></div></div>
                        
                        </div>
                        <div class="TEXT"><p><?php  echo $donnes['TextePublication'];  ?></p></div>
                        <div class="REACT">
                            
                            <form action="Reactions.php?TXT=<?php  echo $donnes['TextePublication'];  ?>& NOM=<?php  echo $donnes['Nom'];  ?>& IDP=<?php echo $donnes['id_publication']; ?>& NOM=<?php  echo $donnes['Nom'];  ?>& IDA=<?php echo $donnes['id_auteur']; ?>" method="post">
                                <select name="reaction" id="">
                                    <option value="1">J'aime</option>
                                    <option value="2">J'adore</option>
                                    <option value="3">Haha</option>
                                    <option value="4">Solidaire</option>
                                </select>
                                <input type="submit" value="Valider">
                            </form>
                           

                            <div class="nb">
                                
                            </div>
                            
                        </div>

                        <div class="COMM">
                        <form action="Publication.php?O=<?php echo $donnes['id_publication']; ?>" method="post">
                            <div class="C1"><input type="text" name="TexteCommentaire"> </div>                          
                            <div class="C2"><input type="submit" value="commenter"> </div>
                        </form>
                        </div>

                        <div class="ACOM">
                        <?php
                        $publicatio="select Membres.Nom,TexteCommentaire,DateHeureCommentaires from Commentaires join Membres on Membres.id=Commentaires.id_auteur where id_publication='%s'";
                        $id3=sprintf($publicatio,$donnes['id_publication']);
                        $Ro=mysqli_query($bdd,$id3); 
                        while($donees = mysqli_fetch_assoc($Ro))
                        { ?>
                        <div id='COM'>
                            <p><img src="Profil\<?php echo $donees['Nom']; ?>.png" width='30px'><?php echo $donees['Nom'];echo "  :   ";echo $donees['TexteCommentaire'];   ?></p>
                            <p id="d"><?php echo $donees['DateHeureCommentaires']; ?></p>
                        </div>
                       <?php } ?> 
                      
                </div>
                                                       
                            
         <?php } ?>
            
        </div>
        
     </div>
     
</body>
</div>
</html>
