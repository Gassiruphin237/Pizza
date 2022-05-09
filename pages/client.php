<?php
require_once('../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/css2.css" />
  <link rel="stylesheet" href="../font/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="../font/css/all.min.css"> -->
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
  <script language="JavaScript" type="text/javascript" src="../js/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="../js/print.js"></script>

  <title>CRUD PHP</title> 
  <script>
    $(document).ready(function(){
        $("#myInput").on("keyup",function(){
            var value = $(this).val().toLowerCase();
            $("#mytable .tr").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });

    $(document).ready(function(){
      $("#mytable #selectAll").click(function(){
        $("#mytable input[type='checkbox']").prop('checked', this.checked)
      })
    })
</script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../img/logo.JPG" class="img-fluid rounded circle" id="logo" width="75" height="75"
          alt="logo" />&nbsp;&nbsp;<span class="span">Pizzaria</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="liste1.php"><i class="fas fa-home " aria-hidden="true"></i>Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" id="print" onclick="printContent('mytable');"><i class="fas fa-print "
                aria-hidden="true"></i>Imprimer</a>
          </li>
          <li class="nav-item">
            <form class="d-flex" action="liste1.php" Method="POST">
              <input class="form-control me-2" type="text" id="myInput" name="search1" placeholder="Search"
                aria-label="Search " required>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
  <br /><br />
  <h4><b>Liste des clients Enrégistrés</b></h4>
  <br />
  <div class="container">
    <form action="" method="post">
      <div class="row">
        <p><input type="text" class="input"  value="" name="nom_cl" id="nom_cl" placeholder="Gassi" required></p>
        <p><input type="text" class="input" value="" name="prenom_cl" id="prenom_cl" placeholder="Ruphin" required></p>
        <p><input type="tel" class="input" value="" name="tel_cl" id="tel_cl" placeholder="Ex: 697814134" maxlength="9"
            pattern="6[0-9]{8}"></p>
        <p><input type="text" class="input" value="" name="adresse_cl" id="adresse_cl" placeholder="logpom" required></p>
        <p><input type="text" class="input" value="" name="note_1" id="note_1" placeholder="Laissez une note!!!" required></p>
        <p><input type="text" class="input" value="" name="username" id="username" placeholder="ruphin237" required></p>
        <p><input type="password" class="input" value="" name="password" id="password" placeholder="*******" required
            maxlength="9" minlength="6"></p>
        <p>
          <button type="submit" class="button" name="bt" id="send">enregistrer</button>
        </p>
        <p>
          <button type="reset" class="button" id="reset">Annuler</button>
        </p>
      </div>
    </form>

  </div>
  <div class="container">
    <br /><br />
    <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
      <i class="fas fa-exclamation-circle"></i> <strong>nombre de clients enregistrés :
        <?php
             require_once('../config/config.php');
              $count = "SELECT COUNT(*) as total FROM client where statut=1";
              $echo = mysqli_query($conn,$count);
              $nbre  =  mysqli_fetch_assoc($echo);
              //var_dump($nbre);
              echo $nbre['total'];
            ?>
      </strong>
      <button type="button" class="btn-close" id="d2" data-bs-dismiss="alert" aria-label="Close"
        onclick="dismiss2();">x</button>
    </div>
    <form action="" method="post">
    <button type="submit" class="btn btn-danger" name="delte"  onclick="return confirm('voulez vous réellemnt supprimer tout ces utilisateurs ???')"><i class="fas fa-trash-alt"></i>  Delete All</button>
    <?php
        if(isset($_POST['Id'])){
          foreach ($_POST['Id'] as $id):
            mysqli_query($conn,"UPDATE client SET statut = 0  WHERE Id='$id'");
          endforeach;
          
          header('location:index.php');
        }
    //     else{
    //       ?>
         <script>
    //         window.alert('Please check user to Delete');
    //         window.location.href='index.php';
    //       </script>
         <?php
    //     }
    // ?>
    </form>
   <br> 
    <table  class="table table-hover" id="mytable">
      <thead class="thead-dark" >
        <tr>
         <th id="S" scope="col">
          <input type="checkbox" name="checkbox[]" id="selectAll">
          </th>
          <th scope="col">id</th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Téléphone</th>
          <th scope="col">Adresse</th>
          <th scope="col">Note</th>
          <th scope="col">Username</th>
          <th scope="col">password</th>
          <th id="M" scope="col">Modifier</th>
          <th id="S" scope="col">Supprimer</th>
        </tr>
      <tbody>
        <?php
        $reponse = mysqli_query($conn,"SELECT * FROM client where statut=1");
            ?>
            <?php
            foreach(mysqli_fetch_all($reponse,MYSQLI_ASSOC) as $donnees){
              ?>
         
        <tr class="tr">  
          <td>
         <input type="checkbox" value="<?php echo $donnees['Id']; ?>" name="Id" id="check">
          </td> 
          <td scope="row">
          <?php echo $donnees['Id'];?>
          </td>
          <td>
          <?php echo $donnees['Nom_client'];?>
          </td>
          <td>
          <?php echo $donnees['Prenom_client'];?>
          </td>
          <td>
          <?php echo $donnees['Tel_client'];?>
          </td>
          <td>
          <?php echo $donnees['Adresse_client'];?>
          </td>
          <td>
          <?php echo $donnees['Note_client'];?>
          </td>
          <td>
          <?php echo $donnees['username'];?>
          </td>
          <td>
          <?php echo $donnees['password'];?>
          </td>
          <td>
          <button class="btn btn-warning" data-toggle="modal" type="button" data-target="#exampleModalLong"><a id="a" href="update.php?Id=<?php echo $donnees['Id']?>"  data-target="#exampleModalLong<?php echo $donnees['Tel_client']?>"><i class="fas fa-edit"></i></a></button>
          </td>
          <td>
          <button class="btn btn-danger" onclick="return confirm('voulez vous réellemnt supprimer  l\'utilisateur <?php echo $donnees['Nom_client']?> ???')"> <a id="a" href="?Id=<?php echo $donnees['Id']?>"><i class="fas fa-trash-alt"></i></a> </button>
          </td>
        </tr>
        <?php } ?>
        
        <?php
            if(isset($_POST['update']))
            {
              if(!empty($_GET))
              {
                  $Id=$_GET['Id'];
                  $sql= "UPDATE `client` SET `Nom_client`= '$nom_cl', `Prenom_client` = '$prenom_cl', `Tel_client` = '$tel_cl', `Adresse_client` = '$adresse_cl', `Note_client` = '$note_1', `username` = '$user', `password` = '$pass' WHERE `client`.`Id` = ".$Id;
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
            if(isset($_GET['Id']))
            {
              $reponse = mysqli_query($conn,"UPDATE client SET statut = 0  WHERE Id=".$_GET['Id']);
              // echo "<script>window.location.assign('client.php')</script>";
              echo "<script>window.location.assign('client.php')</script>";
            }
              ?>
      </tbody>

      </thead>
      <script>
        let d1 = document.getElementById("alert");
        let togg1 = document.getElementById("d1");

        function dismiss() {
          d1.style.display = "none";
          window.location.assign('liste1.php');
        }
      </script>

      <script>
        let d2 = document.getElementById("alert");
        let togg2 = document.getElementById("d2");

        function dismiss2() {
          d2.style.display = "none";
        }
      </script>
    </table>
  </div>
  <div class="modal fade modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modification client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="" method="post">
      <div class="modal-body">
        <?php
        ?>
      <div class="row">
                <div class="col-md-6">
                        <p><label for="nom_cl">Nom:</label></p>
                        <p><input type="text" class="form-control" name="nom_cl" id="nom_cl" placeholder="Gassi"   value="<?php echo $donnees['Nom_client']; ?>"required></p>
                </div>
                <div class="col-lg-6">
                        <p><label for="prenom_cl">Prenom:</label></p>
                        <p><input type="text" class="form-control" name="prenom_cl" id="prenom_cl" placeholder="Ruphin"  value="<?php echo $donnees['Prenom_client']; ?>"  required></p>
                  </div>
                <div class="col-lg-6">
                        <p><label for="tel_cl">Telephone:</label></p>
                        <p><input type="number" class="form-control" name="tel_cl" id="tel_cl" placeholder="Ex: 697814134" maxlength="9"  value="<?php echo $donnees['Tel_client']; ?>" pattern="6[0-9]{8}"></p>
                        </div>
                <div class="col-lg-6">
                        <p><label for="adresse_cl">Adresse:</label></p>
                        <p><input type="text" class="form-control"name="adresse_cl" id="adresse_cl" placeholder="logpom"  value="<?php echo $donnees['Adresse_client']; ?>" required></p>
                </div>
                <div class="col-lg-6">
                        <p><label for="note_1">Note:</label></p>
                        <p><input type="text" class="form-control" name="note_1" id="note_1" placeholder="Laissez une note!!!"  value="<?php echo $donnees['Note_client']; ?>" required></p>
               </div>
               <div class="col-lg-6">
                        <p><label for="username">Nom d'utilisateur:</label></p>
                        <p><input type="text" class="form-control" name="username" id="username" placeholder="ruphin237"  value="<?php echo $donnees['username']; ?>" required></p>
               </div>
               <div class="col-lg-6">
                        <p><label for="password">Mot de passe:</label></p>
                        <p><input type="password" class="form-control" name="password" id="password" placeholder="*******"required value="<?php echo $donnees['password']; ?>"></p>
               </div>
               <div class="col-lg-6">
               </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-success">Mettre à jour</button>
      </div>
    </form>
    </div>
  </div>
</div>
</body>
<?php
if(isset($_POST['bt']))
{
//recuperation des names
$nom_cl=$_POST["nom_cl"];
$prenom_cl=$_POST["prenom_cl"];
$tel_cl=$_POST["num"];
$adresse_cl=$_POST["adresse_cl"];
$note_1=$_POST["note_1"];
$user=$_POST["username"];
$pass=md5($_POST["password"]);
$sql= "INSERT INTO client (Nom_client, Prenom_client, Tel_client, Adresse_client, Note_client,username,password) VALUES ('$nom_cl', '$prenom_cl', '$tel_cl', '$adresse_cl', '$note_1','$user','$pass')";

if (mysqli_query($conn, $sql)) 
{ 
 echo "<script>alert(\"Enregistrement réuissit de $user\")</script>";
 echo "<script>window.location.assign('client.php')</script>";
 }
else
{ 
  var_dump($sql);
 echo "<script>alert(\"Veillez entrez un autre numéros de téléphone que le $tel_cl\")</script>";
}
mysqli_close($conn);
}
?>
</html>