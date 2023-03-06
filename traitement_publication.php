<?php
    session_start();

    $ajout="INSERT INTO publications (id_auteur,DateHeurePublication,TextePublication,TypeAffichage) VALUES ('%s',Now(),'%s','%s')";
   if(isset($_POST['TextePublication'])){
    $add=sprintf($ajout, $_SESSION['id'],$_POST['TextePublication'],$_POST['TypeAffichage']);
    mysqli_query($bdd,$add);
    
   }
   header("Location:Publication.php");
?>