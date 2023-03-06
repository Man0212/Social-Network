<?php


    function ajouter_ami($arg,$a)
    {
        include ('connexion.php');
        $id=sprintf($arg,$a);
        $result = mysqli_query($bdd,$id); 
        $donnees = mysqli_fetch_array($result);
        $result=$donnees[0];

        return $result;
    }

    function requete_id($arg,$arg1){
        include ('connexion.php');
            $id=sprintf($arg,$arg1);
            $result = mysqli_query($bdd,$id);
            return $result;
    }
    function retirer($arg,$arg1,$arg2){
        include ('connexion.php');
        $id=sprintf($arg,$arg1,$arg2);
        $result = mysqli_query($bdd,$id); 
        
        return $result;
    }

    function liste_publication($a)
    {               
        include ('connexion.php');
        $amis="select count(id_publication) from Publications where id_auteur='%s'";
        $id=sprintf($amis,$a);
        $result = mysqli_query($bdd,$id); 
        $row=mysqli_fetch_assoc($result);  
        return $row['count(id_publication)'];
    }

    function liste_amis($A)
    {
        include ('connexion.php');
        $amis2="select count(id2) from Amis where id='%s' and statut='OUI'";
    $id2=sprintf($amis2,$A);
    $resultat=mysqli_query($bdd,$id2); 
    $A=mysqli_fetch_array($resultat);
    return $A[0];
    }


    function insert_publication($a,$b,$c)
    {
        include ('connexion.php');
        $ajout="INSERT INTO publications (id_auteur,DateHeurePublication,TextePublication,TypeAffichage) VALUES ('%s',Now(),'%s','%s')";
        if(isset($b)){
            $add=sprintf($ajout, $a,$b,$c);
            mysqli_query($bdd,$add);
            header("Location:Publication.php");
        }
    }

    function insert_commentaire($a,$b,$c)
    {
        include ('connexion.php');
        $ajout1="INSERT INTO commentaires (id_publication,id_auteur,DateHeureCommentaires,TexteCommentaire) VALUES ('%s','%s',Now(),'%s')";        
        if (isset($c)) {
            $add1=sprintf($ajout1,$a,$b,$c);
            mysqli_query($bdd,$add1);
            header("Location:Publication.php");
        }       
    }
    function reaction($a,$b,$c)
    {
        include ('connexion.php');
        $ajout="INSERT INTO Reactions VALUE ('%s','%s','%s')";
   
            $id=sprintf($ajout,$a,$b,$c);
        mysqli_query($bdd,$id);
        header("Location:Publication.php");
        
        
    }
?>