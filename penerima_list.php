<?php  
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("location:index.php");
        die();        
    }else{
     
        $user_check = $_SESSION['login_user'];
        $user_role = $_SESSION['login_role'];
        if($user_role != 'petugas'){
            header("location:index.php");
            die();
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("partials/head.php"); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
    </head>
    <body class="sb-nav-fixed">
        <?php include("partials/topbar.php"); ?>
        <div id="layoutSidenav">
            <?php include("partials/leftbar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="my-4">Daftar Penerima</h1>                       
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat, Tanggal lahir</th>
                                    <th>Pekerjaan</th>                                   
                                    <th>No. HP</th>
                                    <th>Card ID</th>   
                                    <th>Action</th>                              
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                // $role = $_SESSION['login_role'];
                                include 'global/db_access.php';                                         
                                $load = mysqli_query($conn, "SELECT * FROM penerima ORDER BY penerima_id ASC");   
                                while ($row = mysqli_fetch_array($load)){
                                echo '<tr>';
                                    echo '<td>'.$row['penerima_id'].'</td>';
                                    echo '<td>'.$row['nama'].'</td>';
                                    echo '<td>'.$row['nik'].'</td>';
                                    echo '<td>'.$row['jenis_kelamin'].'</td>';
                                    echo '<td>'.$row['t4_lahir'].','.$row['tgl_lahir'].'</td>';                                                    
                                    echo '<td>'.$row['pekerjaan'].'</td>';                                   
                                    echo '<td>'.$row['no_hp'].'</td>';
                                    echo '<td>'.$row['card_id'].'</td>';     
                                    echo '<td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Edit
                                        </button>
                                    </td>';                               
                                echo '</tr>';                                
                                }   
                            ?>
                            </tbody>
                        </table>   
                    </div>
                </main>
                <?php include('partials/footer.php'); ?>
            </div>
        </div>
        <?php include("partials/scripts.php"); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
        <script src="js/datatable/dataTables.buttons.min.js"></script>
        <script src="js/datatable/buttons.bootstrap.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {
                $('#bootstrap-data-table').DataTable({
                    "order": [[ 0, "desc" ]],
                    responsive : true
                    // "columnDefs" : [
                    //     {
                    //         "targets" : [0],
                    //         "visible" : false
                    //     }
                    // ]
                });
            } );
        </script>
    </body>
</html>
