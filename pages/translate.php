<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
    <script language="JavaScript" type="text/javascript" src="dist/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="font/css/all.min.css">
    <title>home</title>
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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.JPG" class="img-fluid rounded circle" id="logo"  width="75" height="75" alt="logo"/>&nbsp;&nbsp;<span class="span">Pizzaria</span> 
                </a>
                <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link"  href="translate.php"><i class="fas fa-home " aria-hidden="true" ></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><i class="fas fa-shopping-cart " aria-hidden="true" ></i>My Basket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><i class="fas fa-bell " aria-hidden="true" ></i>Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php" ><i class="fas fa-language " aria-hidden="true" ></i>French?</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="" role="button" type="submit" name="deconnexion" ><i class="fas fa-sign-out-alt " aria-hidden="true" ></i>Deconnexion</a>
                    </li>
                     -->
                    </ul>
                </div>
                </div>
                </div>
            </nav>
          <br/><br/>
    <div class="container">
                <div class="row">
                    <div id="block1" class="col-md-5">
                    <?php
                if(isset($_SESSION['user']))
                {
                    echo "<h1 class=\"display-4\"><i class=\"fas fa-user\" aria-hidden=\"true\" ></i>Welcome ".$_SESSION['user']['nom']."</h1>";
                }
                else{
                    header('location: login.php');
                }
                if(isset($_POST['deconnexion']))
                {
                    session_destroy();
                    header('location: login.php');
                }
                ?>
            <p class="lead">You can place your orders and we will send our delivery people there!!! Your satisfaction is our priority</p>
            <hr class="my-5">
            <form action="home.php" Method="POST">
           <button class="btn btn-warning" type="submit" name="deconnexion">Disconnection</button>    
             </form><br/>
           <button id="mode" class="btn btn-dark" onclick="myFunction()">Dark mode</button>
                </div>
                    <div id="block2" class="col-md-7">
                    <h4><b>Purchase order</b></h4><br/>
                    <div class="row">
                            <div class="col-lg-6">
                                <p><label for="username">Order date</label></p>
                                <p><input  disabled class="form-control" id="calendrier" name="calendrier" value="<?php echo date('d/m/Y'); ?>" />
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p><label for="date2">Order date + time</label></p>
                                <p><input  class="form-control" name="date2" id="date2" required value="<?php echo strftime('%d-%m-%Y %H:%M'); ?>" ></p>
                            </div><br/>
                            <div class="col-lg-6">
                            <div class="form-group">
                            <p><label for="exampleFormcontrolSelect1">Select Pizza</label></p>
                            <select class="form-control" id="exampleFormcontrolSelect1"required>
                            <option>Margherita</option>
                            <option>Regina</option>
                            <option>Napolitaine</option>
                            </select>
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <p><label for="number">Amount</label></p>
                                <p><input type="number" class="form-control" name="number" id="number" required></p>
                            </div><br/>
                            <div class="col-lg-6">
                                <p><label for="pu">Unit price</label></p>
                                <p><input disabled type="pu" class="form-control" name="pu" id="pu"></p>
                            </div><br/>
                            <div class="col-lg-6">
                                <p><label for="pt">total price</label></p>
                                <p><input disabled type="text" class="form-control" name="pt" id="pt" ></p>
                            </div><br/>
                            <div class="col-lg-6">
                                <p><label for="pt">Discount</label></p>
                                <p><input disabled type="text" class="form-control" name="remise" id="remise" required></p>
                            </div><br/>
                            <div class="col-lg-6">
                                <p><label for="note2">Note</label></p>
                                <p><input type="number" class="form-control" name="note2" id="note2" placeholder="a note on (/20)" required maxlength="2" minlength="1" required></p>
                            </div><br/>
                            <div class="col-lg-10">
                            <button class="btn btn-outline-success" value='Enregistrer' name="valider">Validate</button>
                            &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-outline-danger" id='submit' value='reset'>Cancel</button>
                            </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
</body>
</html>