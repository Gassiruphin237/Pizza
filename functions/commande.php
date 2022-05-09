<?php
 if(isset($_POST['valider'])){
     $libelle =$_POST["pizza"];
     $Id = $_SESSION['Id'];
     $Nom_client= $_SESSION['Nom'];
     $qte = $_POST["qte"];
     $pu = $_POST["pu"];
     $pt = $_POST["pt"];
     $date_livraison = $_POST["date2"];
     $heure_livraison = $_POST["times"];
     $lieu_livraison = $_POST["lieu"];
     $tel = $_POST["tel"];
     $note = mysqli_real_escape_string($conn,$_POST["note"]);
     $date_aujourdhui = strftime('%Y-%m-%d');
     $heure_aujourdhui= strftime('%H:%M');
    if($date_livraison < $date_aujourdhui){
        echo "<script>window.location.assign('home.php?error=Impossible de choissir cette date de livraison')</script>";
    }
    elseif($heure_livraison < 8 || $heure_livraison > 22){
        echo "<script>window.location.assign('home.php?heure=Veillez choisir un heure raisonable entre 8H00 - 22h00')</script>";
    }
    else{
        //on cree la requête et on attribue les valeures récuperée dans le formulaire
     $sql= "INSERT INTO commandes (Id_client,Libelle_commande,Nom_client,PU,PT,Qte,Date_livraison,Heure_livraison,Lieu_livraison,Numero_client,Note) VALUES('$Id','$libelle',' $Nom_client','$pu','$pt','$qte','$date_livraison','$heure_livraison','$lieu_livraison','$tel','$note')";
     //ici on teste la requete, puis on l'éxecute
     if (mysqli_query($conn, $sql)) 
     { 
     echo"
     <script>
      swal('Enregistrement réuissie dans le panier!', '', 'success');
    </script>
     ";
     $url = "home.php";
         echo"
         <script>
         function reload()
         {
             window.location.assign(\"home.php\");
         }
         setTimeout(\"reload()\",1000);
         </script>
         ";
     }
     else
     { 
     var_dump($sql);
     }
    }
    
     mysqli_close($conn);
 
     //}
    
 }

?>