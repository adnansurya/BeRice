<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("partials/head.php"); ?>
            
        <link rel="stylesheet" href="css/datatable/dataTables.bootstrap.min.css">
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
                                    <th>Pendidikan</th>
                                    <th>No. HP</th>
                                    <th>Card ID</th>                                 
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
                                    echo '<td>'.$row['pendidikan'].'</td>';
                                    echo '<td>'.$row['no_hp'].'</td>';
                                    echo '<td>'.$row['card_id'].'</td>';                                    
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
        <script src="js/datatable/datatables.min.js"></script>
        <script src="js/datatable/dataTables.bootstrap.min.js"></script>
        <script src="js/datatable/dataTables.buttons.min.js"></script>
        <script src="js/datatable/buttons.bootstrap.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {
                $('#bootstrap-data-table').DataTable({
                    "order": [[ 0, "desc" ]],
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
