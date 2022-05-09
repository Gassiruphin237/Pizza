<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_pizza";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

 $Id= $_GET['Id'];
 $requete = "SELECT *FROM client where Id = $Id";
 $requetok = mysqli_query($conn, $requete);
 $test= mysqli_fetch_array($requetok);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/css.css" />
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
    <title>pizza</title>
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
         <!--
         <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
            <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                aria-label="Search">
            <i class="fas fa-search" aria-hidden="true"></i>
        </form>
         -->
        <nav>
        <div class="container">
        <form method="POST" action="update.php?Id=<?php echo $test["Id"]; ?> " > 
        <h4><b>Enregistrer clients</b></h4><br/>
        <div class="row">
        <div class="col-md-4">
        <div class="imgAbt">
        <div class="img-responsive">
        <img src="../img/client.svg" class="img-fluid flt-right" alt="Responsive image">
        </div>
        </div>
        </div>
        <div class="col-md-8">
        <div class="row">
                <div class="col-lg-6">
                        <p><label for="nom_cl">Nom:</label></p>
                        <p><input type="text" class="form-control" name="nom_cl" id="nom_cl" placeholder="Gassi"   value="<?php   if(!empty($_GET))echo $test['Nom_client']; ?>"required></p>
                </div>
                <div class="col-lg-6">
                        <p><label for="prenom_cl">Prenom:</label></p>
                        <p><input type="text" class="form-control" name="prenom_cl" id="prenom_cl" placeholder="Ruphin"  value="<?php   if(!empty($_GET))echo $test['Prenom_client']; ?>"  required></p>
                  </div>
                <div class="col-lg-6">
                        <p><label for="tel_cl">Telephone:</label></p>
                        <p><input type="number" class="form-control" name="tel_cl" id="tel_cl" placeholder="Ex: 697814134" maxlength="9"  value="<?php   if(!empty($_GET))echo $test['Tel_client']; ?>" pattern="6[0-9]{8}"></p>
                        </div>
                <div class="col-lg-6">
                        <p><label for="adresse_cl">Adresse:</label></p>
                        <p><input type="text" class="form-control"name="adresse_cl" id="adresse_cl" placeholder="logpom"  value="<?php   if(!empty($_GET))echo $test['Adresse_client']; ?>" required></p>
                </div>
                <div class="col-lg-6">
                        <p><label for="note_1">Note:</label></p>
                        <p><input type="text" class="form-control" name="note_1" id="note_1" placeholder="Laissez une note!!!"  value="<?php   if(!empty($_GET))echo $test['Note_client']; ?>" required></p>
               </div>
               <div class="col-lg-6">
                        <p><label for="username">Nom d'utilisateur:</label></p>
                        <p><input type="text" class="form-control" name="username" id="username" placeholder="ruphin237"  value="<?php   if(!empty($_GET))echo $test['username']; ?>" required></p>
               </div>
               <div class="col-lg-6">
                        <p><label for="password">Mot de passe:</label></p>
                        <p><input type="password" class="form-control" name="password" id="password" placeholder="*******"required value="<?php   if(!empty($_GET))echo $test['password']; ?>"></p>
               </div>
               <div class="col-lg-6">
               </div>
               <div class="col-lg-6">
                        <button class="btn btn-outline-success" onclick="return confirm('voulez vous modifier ses informations???')" name="bt" type="submit">envoyer</button>
                        &nbsp;&nbsp;&nbsp;
                        <button class="btn btn-outline-danger" type="reset">Annuler</button>
                       
               </div>
    </div>   
</form>
</div>
</nav>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_pizza";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['bt']))
{
//recuperation des name
$nom_cl=$_POST["nom_cl"];
$prenom_cl=$_POST["prenom_cl"];
$tel_cl=$_POST["tel_cl"];
$adresse_cl=$_POST["adresse_cl"];
$note_1=$_POST["note_1"];
$user=$_POST["username"];
$pass= md5( $_POST["password"]);

    if(!empty($_GET))
    {
        $Id=$_GET['Id'];
        $sql= "UPDATE `client` SET `Nom_client` = '$nom_cl', `Prenom_client` = '$prenom_cl', `Tel_client` = '$tel_cl', `Adresse_client` = '$adresse_cl', `Note_client` = '$note_1', `username` = '$user', `password` = '$pass' WHERE `client`.`Id` = $Id";
        var_dump($sql);
        if (mysqli_query($conn, $sql)) 
        { 
        
        echo "<script>window.location.assign('client.php')</script>";
        
        }
        else
        { 
        echo "<script>alert(\"modification echouée \")</script>";
        }
    }
   
}
?>

</body>
</html>