<?php
// session_start();  
include '../global/db_access.php';

// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_POST['nama']) && isset($_POST['nik']) && isset($_POST['jk'])  && isset($_POST['t4Lahir'])
     && isset($_POST['tglLahir']) && isset($_POST['hp']) && isset($_POST['pekerjaan'])  && isset($_POST['pendidikan'])){
         
        $sql = "INSERT INTO penerima (nama, nik, jenis_kelamin, t4_lahir, tgl_lahir, no_hp, pekerjaan, pendidikan, token, card_id ) 
        VALUES ('".$_POST['nama']."','".$_POST['nik']."','".$_POST['jk']."','".$_POST['t4Lahir']."',
        '".$_POST['tglLahir']."','".$_POST['hp']."','".$_POST['pekerjaan']."','".$_POST['pendidikan']."','-','-')";

       
        if(!mysqli_query($conn, $sql)){
            echo "ERROR";
        }else{
            echo "BERHASIL";
            // header("location: ../permintaan.php");
            echo "<script> window.location.href = '../penerima_baru.php'; </script>";
        }       
     }

?>