<?php  
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("location:index.php");
        die();        
    }else{
     
        $user_check = $_SESSION['login_user'];
        $user_role = $_SESSION['login_role'];
        if($user_role != 'admin'){
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
                                    <th>Action</th>
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
            <div class="modal fade" id="kkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Kartu Keluarga Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="form/add_kk.php" method="POST">
                    <div class="modal-body">                    
                        <div class="mb-3">
                            <label for="kkTxt" class="form-label">Nomor KK</label>
                            <input type="text" class="form-control" id="kkTxt" name="kk">                            
                        </div>
                        <div class="mb-3">
                            <label for="kepalaTxt" class="form-label">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" id="kepalaTxt" name="kepala">                            
                        </div>
                        <div class="mb-3">
                            <label for="alamatTxt" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamatTxt" name="alamat">                            
                        </div> 
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="rtTxt" class="form-label">RT</label>
                                    <input type="text" class="form-control" id="rtTxt" name="rt"> 
                                </div>
                                <div class="col-6">
                                    <label for="rwTxt" class="form-label">RW</label>
                                    <input type="text" class="form-control" id="rwTxt" name="rw">  
                                </div>
                            </div>
                                                        
                        </div>
                        <div class="mb-3">
                            <label for="kodeposTxt" class="form-label">Kodepos</label>
                            <input type="text" class="form-control" id="kodeposTxt" name="kodepos">                            
                        </div>
                        <div class="mb-3">
                            <label for="lurahTxt" class="form-label">Kelurahan</label>
                            <input type="text" class="form-control" id="lurahTxt" name="lurah">                            
                        </div>
                        <div class="mb-3">
                            <label for="camatTxt" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatanTxt" name="camat">                            
                        </div>
                        <div class="mb-3">
                            <label for="kotaTxt" class="form-label">Kota / Kabupaten</label>
                            <input type="text" class="form-control" id="kotaTxt" name="kota">                            
                        </div>
                        <div class="mb-3">
                            <label for="provTxt" class="form-label">Provinsi</label>
                            <input type="text" class="form-control" id="provTxt" name="prov">                            
                        </div>                                                                                                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include("partials/scripts.php"); ?>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="js/datatable/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
        <script src="js/datatable/buttons.bootstrap.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {
                $('#bootstrap-data-table').DataTable({
                    "order": [[ 0, "desc" ]],
                    responsive: true
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
