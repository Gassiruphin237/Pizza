<?php 
session_start();
require_once('../config/config.php');
if(isset($_SESSION['Nom']))
{ 

}
else
{
echo "<script>window.location.assign('login.php')</script>";
}
if(isset($_POST['deconnexion']))
{
session_destroy();
echo "<script>window.location.assign('login.php')</script>"; 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
    <script src="../_node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../_node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    
    <script>

        function myFunction() {
            let element = document.body;
            element.classList.toggle("dark-mode");

            var mode = document.getElementById("mode")
            if (mode.innerText === "Dark mode") {
                document.getElementById("mode").innerText = "Light mode";
            }
            else {
                document.getElementById("mode").innerText = "Dark mode";
            }

        }
    </script>
    <link rel="stylesheet" href="../font/css/all.min.css">
    <!-- <script language="JavaScript" type="text/javascript" src="../js/home.js"></script> -->
    <title>panier</title>
</head>

<body>
    <?php include"../includes/navbar.php"; ?>
    <?php include"../includes/partial_views/modal.php"; ?>
    <br>
    <main role="main" class="container" id="mytable">
    <form action="" method="post" id="form1"  class="form-inline my-2 my-lg-0  ml-auto mb-2 mb-lg-0 " style="float: right;" >
      <input class="form-control mr-sm-2" type="text" name="search1" value="<?php  if(isset($_POST['search'])){echo  $_POST['search1'];}else{echo "";} ?>"  placeholder="Search" aria-label="Search">
      <button type="submit" class="btn btn-outline-success my-2 my-sm-0" name="search" >Search</button>
    </form>
    <br><br>
    <form action="" method="post" id="form2">
                <button type="submit" class="btn btn-outline-danger" name="delete" id="btn"> <input type="checkbox" name="delete" id="selectAll">Vider le panier</button>
    </form>
        <?php
            //$nom = $_SESSION['Id'];
            $reponse = mysqli_query($conn,"SELECT * from commandes WHERE Id_client='$Id' And statut='Non livre'");
            $rep = mysqli_num_rows($reponse);
            if($rep>0)
            {
                if(isset($_POST['search'])){
                    $search = $_POST['search1'];
                    require_once('../config/config.php');
                    $Id =  $_SESSION['Id'];  
                    $count = "SELECT COUNT(*) as total FROM commandes where Libelle_commande LIKE '%".$_POST['search1']."%' && statut = 'Non livre' && Id_client ='$Id' ";
                    $echo = mysqli_query($conn,$count);
                    $nbre  =  mysqli_fetch_array($echo);
                    $ok = $nbre['total'];
                    echo"<br>";
                    echo  "Nombre d'occurences pour le Mot <strong><i>$search</strong></i> : $ok";
                    //var_dump($search);
                }
                else{
                    echo "";
                }
            }
            else{
                echo"<center><h5>Aucune commande Actuellement</h5></center>";
                echo'<center><img class="mr-3" src="../img/cook.svg" alt="" width="200"></center>';
                echo"
                <script>
                let form1 = document.getElementById('form1');
                let form2 = document.getElementById('form2');
                let footer = document.getElementById('footer');
                footer.style.display='none';
                form1.style.display='none';
                form2.style.display='none';
                </script>
                ";

            }
            ?>
            <?php 
            if(isset($_POST['delete']))
            {
                $Id_client =  $_SESSION['Id'];
                $delete =  mysqli_query($conn,"DELETE  from commandes  WHERE Id_client=".$Id_client);
                echo "<script>window.location.assign('panier.php')</script>";
            }
            
            ?>
            <?php
            if(isset($_POST['search'])){
                $res = $_POST['search1'];
                $Id_client =  $_SESSION['Id'];
                $sql="SELECT * FROM commandes WHERE statut ='Non livre' AND  Id_client='$Id_client' AND  Libelle_commande LIKE '%".$_POST['search1']."%'";
                $reponse = mysqli_query($conn,$sql);
                $rows = mysqli_num_rows($reponse);
                if($rows>0)
                {
                   // echo"success";
                }
                else{
                echo"<br>";
                echo"
                <br>
                <div class=\"alert alert-danger alert-dismissible fade show\" id=\"alert\" role=\"alert\">
                <i class=\"fas fa-warning\"></i><strong>Aucun Résultat pour << $res >> </strong>
                <i class=\"fas fa-times\" onclick=\"remove();\" style=\"float:right; cursor:pointer; margin-top:5px\" id=\"d2\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></i>
                </div>
                ";
                }
            
            }
            else{
                $Id =  $_SESSION['Id'];  
                $reponse = mysqli_query($conn,"SELECT * FROM commandes WHERE statut ='Non livre' && Id_client ='$Id' ");
                //var_dump($reponse);
                
            }
            foreach(mysqli_fetch_all($reponse,MYSQLI_ASSOC) as $donnees){
            ?>
        
            <div class="d-flex align-items-center p-3 my-3 text-50 bg-purple rounded shadow-lg"
            style="border: 1px solid #ffff">
            <input type="checkbox" name="Id" id="check">
            <img class="mr-3" src="../img/cook.svg" alt="" width="48" height="48">
            <div class="lh-100">
                <h6 class="mb-0 lh-100">
                    <?php echo $donnees['Libelle_commande'];?>
                </h6>
                <h6>Note:
                        <?php if(empty($donnees['Note'])){echo "Aucune note";}else{echo $donnees['Note'];}?>
                </h6>
            </div>
            <div class="d-flex justify-content-between align-items-center w-100">
                <center>
                    <div class="row">
                        <h6><strong style=" margin-left: 100px;">Qte:
                            <input type="number"    style="width: 40px;" value="<?php echo $donnees['Qte'];?>">
                                </strong>
                        </h6>
                        <p>
                            <h6><strong style=" margin-left: 100px;">PU:
                                <input type="number"   style="width: 140px;" value="<?php echo $donnees['PU'];?>" readonly>
                                    </strong>
                            </h6>
                        </p>
                        <p>
                            <h6><strong style=" margin-left: 100px;">Sous Total:
                                <input type="number"   style="width: 140px;" value="<?php echo $donnees['PT'];?>" readonly>
                                    </strong>
                            </h6>
                        </p>
                    </div>
                   
                        
                </center>
               
                <span>
                <script>

                    $(document).ready(function(){
                        $("#button<?php echo $donnees['Id']; ?>").click(function(){
                        $(".<?php echo  $donnees['Id']; ?>").fadeOut();
                        $(".hide<?php echo  $donnees['Id']; ?>").show();
                        });
                    });
                    $(document).ready(function(){
                        $("#<?php echo  $donnees['Id']; ?>").click(function(){
                        $(".hide<?php echo  $donnees['Id']; ?>").hide();
                        $(".<?php echo  $donnees['Id']; ?>").show("fadeOut");
                        });
                    });
                </script>
                    <i class="fas fa-plus hide<?php  echo $donnees['Id'];  ?>"  style="float:right; cursor:pointer; margin-top:5px; margin-right: 20px; "aria-label="Close" id="<?php echo $donnees['Id']; ?>"></i>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <i class="fas fa-times"  style="float:right; cursor:pointer; margin-top:5px;margin-right: 20px;"aria-label="Close" id="button<?php  echo $donnees['Id'];  ?>"></i>
                    <div class="<?php echo  $donnees['Id']; ?>" style="display: none;">
                    <br>
                        <span>
                            <a class="btn btn-outline-success" href="">
                                <i class="fas fa-coins"></i></a>
                            <a class="btn btn-outline-warning"
                                href="update_materiel.php?LIBELLE=<?php echo $donnees['Libelle_commande']?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-outline-danger" href="?Id=<?php echo $donnees['Id']?>"
                                onclick="return confirm('Voulez êtes sur le point de supprimer la commande <?php echo $donnees['Libelle_commande'];?> ')"><i
                                    class="fa fa-trash"></i></a>
                        </span>
                    </div>
                </span>
                
            </div>
        </div>
        <?php } ?>
        <div class="d-flex" id="footer" style="display:felx;flex-wrap: wrap;justify-content: space-between; align-items:center;">
        <h6>Quantité Total: 
            <?php
            $Id_client =  $_SESSION['Id'];
            $reponse2 = mysqli_query($conn,"SELECT SUM(QTE) from commandes WHERE Id_client ='$Id_client'");
        // var_dump($reponse2);
            if($reponse2){
                foreach(mysqli_fetch_all($reponse2,MYSQLI_ASSOC) as $tmt){

                    echo $tmt['SUM(QTE)'];
                }  
            }
            if($reponse2 == null){
                echo "0";
            }
        
         ?>
        </h6>
        
        <h6>Net à payer (TVA:19,25):
        <?php
            $Id_client =  $_SESSION['Id'];
            $reponse2 = mysqli_query($conn,"SELECT SUM(PT) from commandes WHERE Id_client ='$Id_client'");
            // var_dump($reponse2);
            if($reponse2){
                foreach(mysqli_fetch_all($reponse2,MYSQLI_ASSOC) as $tmt){

                    echo $tmt['SUM(PT)'];
                }  
            }
            if($reponse2 == null){
                echo "0";
            }
        
         ?>
        </h6>
        </div>
       
        <?php 
        if(isset($_GET['Id']))
        {
            $req = mysqli_query($conn,"DELETE  from commandes  WHERE Id=".$_GET['Id']);
            echo "<script>window.location.assign('panier.php')</script>";
        }
        ?>

    </main>
    <br><br>
    <hr id="hr2" class="container">
    <?php include"../includes/footer.php"; ?>

    <script>
        e = true
        function myFunction() {
            var element = document.body
            let hr = document.getElementById("hr");
            element.classList.toggle('dark-mode')
            hr2.style.background = "white ";
            if (e) {
                document.getElementById('eye').src = '../img/sun.png'
                e = false
            } else {
                document.getElementById('eye').src = '../img/moon.png'
                hr2.style.background = "black ";
                e = true
            }
        }

        $(document).ready(function(){
      $("#mytable #selectAll").click(function(){
        $("#mytable input[type='checkbox']").prop('checked', this.checked)
      })
    })

    let div = document.getElementById("alert");
        function remove(){
            div.style.display="none";
            window.location = "panier.php";
        }
    </script>

</body>

</html>