<?php
//  require_once '../config/config.php';
    //   $is_connect= false;
    //   if(isset($_POST['valider']))
    //   {
    //     $email = $_POST['username'] ;
    //     $pass = $_POST['password']; 
    //     if(empty($email) && empty($pass)){
    //         header("location: login.php?error= username and password  is required ");
    //         exit();
            
    //     }
    //     echo "<script>location.reload()</script>";
    //     if(empty($email))
    //     {
    //         header("location: login.php?error= username  is required ");
    //         exit();
    //     }
    //     echo "<script>location.reload()</script>";
    //     if(empty($pass)){
    //         header("location: login.php?error=password is required");
    //         exit();
    //     }
    //    // hash()
    //     else{
    //         $reponse = mysqli_query($conn,"SELECT * FROM client");
    //         foreach(mysqli_fetch_all($reponse,MYSQLI_ASSOC) as $donnees)
    //         {
    //             if($_POST['username']== $donnees['username']  && md5($_POST['password']) == $donnees['password'])
    //             {
    //                 $is_connect= true;
    //                 $_SESSION['user']['id']=$donnees['Id'];
    //                 $_SESSION['user']['nom']=$donnees['Nom_client'];
    //                 $_SESSION['user']['prenom']=$donnees['Prenom_client'];
    //                 $_SESSION['user']['username']=$donnees['username'];
    //                 $_SESSION['user']['pass']=$donnees['password'];
    //                 $_SESSION['user']['lieu']=$donnees['Adresse_client'];
    //                 $_SESSION['user']['tel']=$donnees['Tel_client'];
    //                 header('location: home.php');
    //             }
    //             elseif($is_connect== false){
    //                 header("location: login.php?error=Incorrect informations");
    //              }
    //         } 
    //   }
    // }
require_once '../config/config.php';

if(isset($_POST['valider']))
{ 
     $pass=md5($_POST['password']);
     $username= $_POST['username'];

    if(empty($username) && empty($pass)){
        header("location: login.php?error= username and password  is required ");
        exit();
        
    }
    if(empty($username))
    {
        header("location: login.php?error= username  is required ");
        exit();
    }
    if(empty($pass)){
        header("location: login.php?error=password is required");
        exit();
    }
    elseif(!empty($username) && !empty($pass)){
        $query="SELECT * FROM `client` WHERE username='$username' AND password='$pass'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
         if($rows==1)
         
         {
             $req=mysqli_fetch_all($result,MYSQLI_ASSOC);
             $_SESSION['role']=$req[0]["role"];
             $_SESSION['Id']=$req[0]['Id'];
             $_SESSION['Nom']= $req[0]["Nom_client"];
             $_SESSION['Prenom'] = $req[0]["Prenom_client"];
             $_SESSION['Adresse']=$req[0]['Adresse_client'];
             $_SESSION['Tel']=$req[0]['Tel_client'];
             $_SESSION['Username']=$req[0]['username'];
             $_SESSION['Pass']=$req[0]['password'];
             $_SESSION['avatar']=$req[0]['avatar'];
 
           if($req[0]["role"]=="admin")
           {
               $_SESSION['admin']=$req[0];
               header("location: dashord.php");
           }
           else if($req[0]["role"]=="client")
           {
           
             echo '<script>window.location.assign("home.php")</script>';
           }
         }
         else
         {
         echo '<script>window.location.assign("login.php?error=Incorrect informations")</script>';
       }
    }
      
}
?>