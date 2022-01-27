<?php
    session_start();
    if(isset($_POST['user']) && isset($_POST['pass'])) {
        // username and password sent from form 
        
         $myuser = $_POST['user'];
         $mypassword = $_POST['pass'];
    
         include '../db_access.php';
         $load = mysqli_query($conn, "SELECT * FROM user WHERE (email = '".$myuser."' OR hp = '".$myuser."') AND password='".$mypassword."'" );  
         $row = mysqli_fetch_array($load,MYSQLI_ASSOC);

    }
?>