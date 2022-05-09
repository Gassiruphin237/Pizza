<?php 
session_start();
require_once('../config/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../font/css/all.min.css">
    <script src="../_node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../_node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script language="JavaScript" type="text/javascript" src="../js/home.js"></script>
    <title>home</title>

</head>

<body  onload="heure();">
<?php include"../includes/navbar.php"; ?>
<?php include"../includes/partial_views/modal.php"; ?>
    <?php
        if(isset($_POST["update"])){
            $Id =  $_SESSION['Id'];
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $tel = $_POST["tel"];
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            $requete = "UPDATE client  SET Nom_client = '$nom', Prenom_client = '$prenom', Tel_client = '$tel', username = '$username', password  = '$pass ' WHERE client.Id =".$Id;
            $exec = mysqli_query($conn, $requete);
            if(empty($pass)){
                
            }
            if ($exec) 
            { 
                $reponse = mysqli_query($conn,"SELECT * FROM client WHERE Id=".$Id);
                foreach(mysqli_fetch_all($reponse,MYSQLI_ASSOC) as $donnees)
                {
                    $_SESSION['role']=$req[0]["role"];
                    $_SESSION['Id']=$req[0]['Id'];
                    $_SESSION['Nom']= $req[0]["Nom_client"];
                    $_SESSION['Prenom'] = $req[0]["Prenom_client"];
                    $_SESSION['Adresse']=$req[0]['Adresse_client'];
                    $_SESSION['Tel']=$req[0]['Tel_client'];
                    $_SESSION['Username']=$req[0]['username'];
                    $_SESSION['Pass']=$req[0]['password'];
                    $_SESSION['avatar']=$req[0]['avatar'];
                       // echo "<script>alert(\"modification réuissie\")</script>";
                        var_dump($_SESSION);
                    echo "<script>window.location.assign('home.php')</script>";
                    }
           
            }
            else
            { 
           // var_dump($requete);
            }
            mysqli_close($conn);
        }
    ?>
    <br /><br />
    <div class="container"  style="margin-top:50px">
    <?php if(isset($_GET['message'])){?>
    <div class="alert alert-success alert-dismissible fade show" id="alert2" role="alert">
      <i class="fas fa-shopping-cart"></i><strong>  <?php  echo $_GET['message'];?></strong>
      <i class="fas fa-times" onclick="display();" style="float:right; cursor:pointer; margin-top:5px" id="d2" data-bs-dismiss="alert" aria-label="Close"></i>
    </div>
    <script>
        let div2 = document.getElementById("alert2");
        function display(){
            div2.style.display="none";
            window.location = "home.php";
        }
    </script>
    <?php } ?>
    <?php if(isset($_GET['error'])){?>
    <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
      <i class="fas fa-calendar"></i><strong>  <?php  echo $_GET['error'];?></strong>
      <i class="fas fa-times" onclick="remove();" style="float:right; cursor:pointer; margin-top:5px" id="d2" data-bs-dismiss="alert" aria-label="Close"></i>
    </div>
    <script>
        let div = document.getElementById("alert");
        function remove(){
            div.style.display="none";
            window.location = "home.php";
        }
    </script>
    <?php } ?>

    <?php if(isset($_GET['heure'])){?>
    <div class="alert alert-danger alert-dismissible fade show" id="alert3" role="alert">
      <i class="fas fa-clock"></i><strong>  <?php  echo $_GET['heure'];?></strong>
      <i class="fas fa-times" onclick="cut();" style="float:right; cursor:pointer; margin-top:5px" id="d2" data-bs-dismiss="alert" aria-label="Close"></i>
    </div>
    <script>
        let div3 = document.getElementById("alert3");
        function cut(){
            div3.style.display="none";
            window.location = "home.php";
        }
    </script>
    <?php } ?>
        <div class="row">
            <div id="block1" class="col-md-5">
                <?php
                if(isset($_SESSION['Nom']))
                { ?>

                   <h4 class="display-4">
                   <img src="../img/<?php echo $_SESSION['avatar'] ;?>" width="70" style="border-raduis:50px" alt="">
                   <span id="message"></span>
                   <span id="user" name="user"><?php echo $_SESSION['Prenom'] ;?></span>
                     </h4>
                    
                   
                <?php }
                else{
                    echo "<script>window.location.assign('login.php')</script>";
                }
                if(isset($_POST['deconnexion']))
                {
                    session_destroy();
                    echo "<script>window.location.assign('login.php')</script>"; 
                }
                ?>
                <p class="lead">Vous pouvez passez vos commndes et nous enverrons nos livreurs sur place!!!. votre
                    satisfaction est notre priorité</p>
                <hr class="my-5" id="hr">
                <center>
                <img src="../img/qrcode.png" alt=""width="200">
                </center>
                
            </div>
            <div id="block2" class="col-md-7">

                <form action="" method="post">
                    <nav>
                        <h4><b>Bon de Commande</b></h4><br />
                        <div class="row">
                            <div class="col-lg-6">
                                <p><label for="date2">Date livraison</label></p>
                                <p><input type="date" class="form-control" name="date2" id="date2" required></p>
                            </div><br />
                            <div class="col-lg-6">
                                <p><label for="times">Heure de livraison</label></p>
                                <p><input type="time" class="form-control" name="times" id="times" required>
                                </p>
                            </div><br />
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <p><label for="pizza">Selectionner la pizza</label></p>
                                    <select class="form-control" name="pizza" id="pizza" required onchange="getprix()">
                                        <option value="0">-----Selectionnez une pizza-----</option>
                                        <?php 
                                        $reponse = mysqli_query($conn,"SELECT * FROM pizza");
                                         foreach(mysqli_fetch_all($reponse,MYSQLI_ASSOC) as $donnees)
                                         {
                                          ?>
                                           <option value="<?php echo $donnees["Nom_pizza"] ?>"><?php echo $donnees["Nom_pizza"]  ?></option>
                                           <?php 
                                         }
                                        ?>

                                       
                                    </select>
                                </div>
                            </div><br>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <p><label for="qte">Quantité</label></p>
                                    <p><input type="number" class="form-control" name="qte" id="qte" required></p>
                                </div>
                            </div><br>
                            <div class="col-lg-6">
                                <p><label for="pu">Prix Unitaire</label></p>
                                <p><input type="number" class="form-control" name="pu" id="pu" readonly>
                                </p>
                            </div><br />
                            <div class="col-lg-6">
                                <p><label for="pt">Prix total</label></p>
                                <p><input type="number" class="form-control" name="pt" id="pt" readonly>
                                </p>
                            </div><br />
                            <div class="col-lg-6">
                                <p><label for="pt">Lieu livraison</label></p>
                                <p><input type="text" class="form-control" name="lieu" id="lieu" value="<?php 
                                   echo $_SESSION['Adresse']; ?> ">
                                </p>
                            </div><br />
                            <div class="col-lg-6">
                                <p><label for="tel">N° Téléphone</label></p>
                                <p><input type="tel" class="form-control" name="tel" id="tel" value="<?php   
                                   echo $_SESSION['Tel'];  ?> ">
                                </p>
                            </div><br />
                            <div class="col-lg-12">
                                <p><label for="note">Note (min 200 caractères)</label></p>
                                <p>
                                    <textarea class="form-control" name="note" id="note" col="100" rows="4"  placeholder="notifiez si vous le souhaitez">

                                    </textarea>
                                </p>
                            </div><br />
                            <div class="col-lg-10">
                                <button class="btn btn-outline-success" type="Enregistrer" name="valider"
                                    id="btn">Valider</button>
                                &nbsp;&nbsp;&nbsp;
                                <button class="btn btn-outline-danger" id='submit' type="reset">Annuler</button>
                            </div>
                    </nav>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>

<hr id="hr2" class="container">
<?php include"../includes/footer.php"; ?>
    
<script>
    e = true
    function myFunction() {
    var element = document.body
    let hr = document.getElementById("hr");
    let hr2 = document.getElementById("hr2");
    element.classList.toggle('dark-mode')
    hr.style.background="white ";
    hr2.style.background="white ";
    if (e) {
        document.getElementById('eye').src = '../img/sun.png'
        e = false
    } else {
        document.getElementById('eye').src = '../img/moon.png'
        hr.style.background="black ";
        hr2.style.background="black ";
        e = true
    }
    }
</script>
</body>
<script>
    $("#qte,#pu").keyup(function () {
        $('#pt').val($('#qte').val() * $('#pu').val())
    })
</script>
<?php require_once"../functions/commande.php"; ?>

</html>