<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/ok.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script type="text/javascript">
        function refresh() {
            var t = 1000; // rafraîchissement en millisecondes
            setTimeout('showDate()', t)
        }

        function showDate() {
            var date = new Date()
            var h = date.getHours();
            var m = date.getMinutes();
            var s = date.getSeconds();
            date.getMonths()
            if (h < 10) { h = '0' + h; }
            if (m < 10) { m = '0' + m; }
            if (s < 10) { s = '0' + s; }
            var time = h + ':' + m + ':' + s
            document.getElementById('horloge').innerHTML = time;
            refresh();
        }
    </script>
</head>

<body onload="showDate();">
    <div class="container">
      
        <center>
            <span id="horloge"></span>
            <h3>Portail captif</h3>
        <form action="" Method="POST">
        <div class="col-md-4">
                <p>
                    <center>
                   <img class="logo" src="img/logo.jpg" width="110" height="100"; alt="">
                   </center>
                </p>
            </div>
            <div class="col-md-5">
                <p class="username">
                  <input type="email" class="user form-control" name="email" placeholder="email" required>
                </p>
                
            </div>
            <div class="col-md-5">
                <p>
                    <input type="password" class="user form-control" name="pass" placeholder="password" maxlength="8" minlength="6" required>
                </p>
            </div>
            <div class="col-md-5">
                <p>
                    <button type="submit" class="submit form-control" name="valider">Sign In</button>
                </p>
            </div>
            <div class="col-md-5">
                <p>
                    <button type="reset" class=" reset form-control">Reset</button>
                </p>
            </div>
            <div class="col-md-5">
                <p>
                    <i class="fa fa-lock"><a href="renitialisation.php">forgot Password?</a></i>
                    <input type="checkbox" class="checkbox" name="save" id="save"> <label for="save"> <strong>Remenber Me</strong></label>
                </p>
            </div>
         
        </form>
    </div>
    </center>
    <footer>
        <center>
        @copyright || Telis-Ltd 2021
        </center>
        
    </footer>
</body>
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
      $is_connect= false;
      if(isset($_POST['valider']))
      { $pass=md5($_POST['pass']);
         $reponse = mysqli_query($conn,"SELECT * FROM administrateur");
         foreach(mysqli_fetch_all($reponse,MYSQLI_ASSOC) as $donnees)
         {
            
             if($_POST['email']== $donnees['email'] && md5($_POST['pass'])== $donnees['pass'])
             {
                 $is_connect= true;
                 
                 $_SESSION['user']=$donnees;
                 header('location: tableau.php');
             }
         } 
         if($is_connect== false)
         {
            echo "<script>alert(\"email ou mot de passe incorrect!!!\")</script>";
         }
      }
     

    ?>
</html>