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
                        <h1 class="my-4">Daftar Keluarga</h1>                       
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Alamat</th>
                                    <th>RT/RW</th>
                                    <th>Kodepos</th>
                                    <th>Kelarahan</th>
                                    <th>Kecamatan</th>
                                    <th>Kota/Kabupaten</th>
                                    <th>Provinsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                // $role = $_SESSION['login_role'];
                                include 'global/db_access.php';                                         
                                $load = mysqli_query($conn, "SELECT * FROM kk_penerima ORDER BY id_kk ASC");   
                                while ($row = mysqli_fetch_array($load)){
                                echo '<tr>';
                                    echo '<td>'.$row['id_kk'].'</td>';
                                    echo '<td>'.$row['no_kk'].'</td>';
                                    echo '<td>'.$row['kepala'].'</td>';
                                    echo '<td>'.$row['alamat'].'</td>';
                                    echo '<td>'.$row['rt_rw'].'</td>';
                                    echo '<td>'.$row['kodepos'].'</td>';                     
                                    echo '<td>'.$row['lurah'].'</td>';
                                    echo '<td>'.$row['camat'].'</td>';
                                    echo '<td>'.$row['kota'].'</td>';
                                    echo '<td>'.$row['provinsi'].'</td>';
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
