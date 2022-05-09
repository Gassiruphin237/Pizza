<?php
require_once('../config/config.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/css.css" />
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
    <title>Livreur</title>
</head>
<body >
        <br/>
        <script>
        function myFunction() {
            var element = document.body;
            element.classList.toggle("dark-mode");
  
            var mode = document.getElementById("mode")
            if(mode.innerText==="Dark mode"){
                document.getElementById("mode").innerText="Light mode";
            }
            else{
                document.getElementById("mode").innerText="Dark mode";       
            }
      
        }
        </script>
         &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <button id="mode" class="btn btn-outline-dark" onclick="myFunction()">Dark mode</button>
        <nav>
        <br><br><br><br>
        <div class="container">
        <form method="POST" action="livreur.php"> 
        <h4><b>Inscription Livreur</b></h4><br/>
        <div class="row">
        <div class="col-md-4">
        <div class="imgAbt">
        <div class="img-responsive">
        <img src="img/liste.svg" class="img-fluid flt-right" alt="Responsive image">
        </div>
        </div>
        </div>
        <div class="col-md-8">
        <div class="row">
                <div class="col-lg-6">
                        <p><label for="nom">Nom:</label></p>
                        <p><input type="text" class="form-control" name="nom" id="nom" placeholder="Etambat" required></p>
                </div>
                <div class="col-lg-6">
                        <p><label for="prenom">Prenom:</label></p>
                        <p><input type="text" class="form-control" name="prenom" id="prenom" placeholder="Arnaud" required></p>
                  </div>
                <div class="col-lg-6">
                        <p><label for="adresse_cl">Adresse:</label></p>
                        <p><input type="text" class="form-control"name="adresse" id="adresse_cl" placeholder="Kotto"required></p>
                </div>
                <div class="col-lg-6">
                        <p><label for="num">Numero Telephone</label></p>
                        <p><input type="text" class="form-control" name="num" id="num" placeholder="+237 XXX XXX XXX"required></p>
               </div>
               <div class="col-lg-6">
                        <p><label for="datetim">Date et heure d'inscription:</label></p>
                        <p><input type="text" class="form-control" name="datetim" id="datetim" value="<?php echo strftime('%d-%m-%Y %H:%M'); ?>"disabled ></p>
               </div>
               <div class="col-lg-6">
               <P><label for="cv">Votre Cv :</label></P>
              <P><input type="file" style="height:40px;"  name="cv" id="cv"></P> 
               </div>
               <div class="col-lg-6">
                        <button class="btn btn-outline-success" name="bt" type="submit">Enregistrer</button>
                        &nbsp;&nbsp;&nbsp;
                        <button class="btn btn-outline-danger" type="reset">Annuler</button>
                       
               </div>
            
    </div>   
</form>
</div>
</nav>
<?php
if(isset($_POST['bt']))
{
//recuperation des name
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$adresse=$_POST["adresse"];
$num=$_POST["num"];
$datetim=$_POST["datetim"];
$cv=$_POST["cv"];
$sql= "INSERT INTO livreur (nom, prenom, adresse, num, datetim, cv) VALUES ('$nom', '$prenom', '$adresse', '$num','$datetim', '$cv')";

if (mysqli_query($conn, $sql)) 
{ 
 echo "<script>alert(\"Inscription réuissit\")</script>";
 }
else
{ 
 echo "<script>alert(\"Inscription echouée\")</script>";
}
mysqli_close($conn);
}
?>

</body>
</html>