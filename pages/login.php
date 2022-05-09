<?php 
 session_start();
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/css3.css" />
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../font/css/all.min.cs bs">
    <title>Authentification</title>
</head>
<body>
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
         &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <button id="mode" class="btn btn-outline-dark" onclick="myFunction()">Dark mode</button><br/>
         <h4><b>Authentification</b></h4>
   <nav>
       <form action="login.php" Method="POST">
            <div class="container">
                <div class="row">
                    <div id="block1" class="col-md-6">
                        <div class="img-responsive">
                        <img src="../img/login.svg" class="img-fluid flt-right" alt="Responsive image"><br/>
                       <p class="pass"><a href="#">Mot de passe oublié?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-lock"></i> Pizza @copyright || 2021</p> 
                        </div>
                    </div>
                    
                            </strong>
                    <div id="block2" class="col-md-6">
                            <div class="col-md-10">
                            <?php if(isset($_GET['error'])){?>
                            <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                <strong>
                                    <?php  echo $_GET['error'];?>
                                </strong>
                            </div>
                            <?php } ?>
                            </div>
                            <div class="col-md-10">
                                <p><label for="username">Username</label></p>
                                <p><input type="text" class="form-control" name="username" id="username" placeholder="Gassi" ></p>
                            </div>
                            <div class="col-md-10">
                                <p><label for="password">Password</label></p>
                                <p><input type="password" class="form-control" name="password" id="password" placeholder="*******"  ></p>
                            </div><br/>
                            <div class="col-md-10">
                            <input type="submit" id='submit' value='Sign In' name="valider"><br/><br/>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </nav>
    <?php
     require_once"../functions/checklogin.php";
    ?>
</body>
</html>
