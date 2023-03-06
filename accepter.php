
<?php
$bdd=mysqli_connect('localhost','root','root','data');
session_start();
$_SESSION['user'];
$_SESSION['id'];
$_SESSION['val']=$_GET['val'];


 $del="select *from Amis where id2='%s' and id='%s'";
 $id=sprintf($del,$_SESSION['id'],$_GET['val']);
 $result = mysqli_query($bdd,$id); 
 while($donnes = mysqli_fetch_assoc($result)) { 
  echo $date=$donnes['DateEtHeureDemande'];
 }
 echo ' --------- ';
 $recherche="INSERT INTO Amis VALUES ('%s','%s','%s',now(),'OUI')";
 $recherche=sprintf($recherche,$_SESSION['id'],$_GET['val'],$date);
 mysqli_query($bdd,$recherche);
 echo $recherche;

 echo ' -----';
 $r=" UPDATE Amis SET DateEtHeureAccepation=NOW() ,statut='OUI' WHERE id='%s' and id2='%s'";
 $r=sprintf($r,$_GET['val'],$_SESSION['id']);
 mysqli_query($bdd,$r);
 echo $r;
 header('location:Publication.php');

?>