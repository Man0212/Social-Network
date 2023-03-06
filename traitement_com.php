<?php
       $ajout1="INSERT INTO commentaires (id_publication,id_auteur,DateHeureCommentaires,TexteCommentaire) VALUES ('%s','%s',Now(),'%s')";
       $add1=sprintf($ajout1,$_GET['O'],$_SESSION['id'],$_POST['TexteCommentaire']);
       if (isset($_POST['TexteCommentaire'])) {mysqli_query($bdd,$add1);}

       header("Location:Publication.php");


?>