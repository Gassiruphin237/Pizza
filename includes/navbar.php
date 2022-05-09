<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../img/logo.JPG" class=" circle" id="logo" width="65" height="55" alt="logo" />&nbsp;&nbsp;<span
                class="span"> Pizzaria</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="home.php"><i class="fas fa-home " aria-hidden="true"></i> Acceuil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="panier.php"><i class="fas fa-shopping-cart " aria-hidden="true">
                            <sup>
                                <?php
                                    require_once('../config/config.php');
                                    $Id =  $_SESSION['Id'];  
                                    $count = "SELECT COUNT(*) as total FROM commandes where statut = 'Non livre' && Id_client ='$Id' ";
                                    $echo = mysqli_query($conn,$count);
                                    $nbre  =  mysqli_fetch_array($echo);
                                    echo $nbre['total'];
                                    ?>
                            </sup></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"><i class="fas fa-bell " aria-hidden="true"></i> Notification</a>
                </li>
                <li class="nav-item">
                    <a type="button" href="#" class="nav-link text-dark" data-toggle="modal" data-target=".bd-example-modal-lg"><i
                            class="fas fa-user" aria-hidden="true"></i>Mon profile</a>
                </li>
                <li class="nav-item">
                    <a type="button" id="mode" onclick="myFunction();" class=""><img src="../img/moon.png"
                            id="eye" style="width: 20px; height: 20px; cursor: pointer; margin-top:8px;"
                            title="darkmode"></a>
                </li>
                <li class="nav-item">
                    <form action="home.php" Method="POST">
                        <button class="btn btn-warning" type="submit" name="deconnexion">Déconnexion</button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>
<br><br><br><br>
    