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
                        <div class="row">
                            <div class="col-md-6">                                
                                <h1 class="my-4">Daftar User</h1>                                  
                            </div>
                            <div class="col-md-6">                               
                                <button class="btn btn-success btn-sm my-4 float-end start-100 top-50" data-bs-toggle="modal" data-bs-target="#userModal">Tambah User</button>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">                                                 
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat, Tanggal lahir</th>
                                            <th>Alamat</th>
                                            <th>Pekerjaan</th>                                           
                                            <th>Email</th>
                                            <th>No. HP</th>
                                            <th>Role</th>
                                            <th>Password</th>                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        // $role = $_SESSION['login_role'];
                                        include 'global/db_access.php';                                         
                                        $load = mysqli_query($conn, "SELECT * FROM user ORDER BY user_id ASC"); 
                                        // if($load){
                                            while ($row = mysqli_fetch_array($load)){
                                                echo '<tr>';
                                                    echo '<td>'.$row['user_id'].'</td>';
                                                    echo '<td>'.$row['nama'].'</td>';
                                                    echo '<td>'.$row['nik'].'</td>';
                                                    echo '<td>'.$row['jenis_kelamin'].'</td>';
                                                    echo '<td>'.$row['t4_lahir'].','.$row['tgl_lahir'].'</td>';                                                    
                                                    echo '<td>'.$row['alamat'].'</td>';
                                                    echo '<td>'.$row['pekerjaan'].'</td>';                                                  
                                                    echo '<td>'.$row['email'].'</td>';
                                                    echo '<td>'.$row['no_hp'].'</td>';
                                                    echo '<td>'.$row['role'].'</td>';
                                                    echo '<td>'.$row['pass'].'</td>';                                    
                                                echo '</tr>';                                
                                            }   
                                        // }                                  
                                        
                                    ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data User Baru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="form/add_user.php" method="POST">
                                <div class="modal-body">   
                                    <div class="mb-3">
                                        <label for="namaTxt" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="namaTxt" name="nama">                            
                                    </div>                 
                                    <div class="mb-3">
                                        <label for="nikTxt" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="nikTxt" name="nik">                            
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="jkTxt" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" aria-label="Jenis Kelamin" name="jk">                                
                                            <option value="Laki-Laki" selected>Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>                                
                                        </select>                            
                                    </div> 
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="t4lahirTxt" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="t4lahirTxt" name="t4Lahir"> 
                                            </div>
                                            <div class="col-6">
                                                <label for="tglLahirxt" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tglLahirTxt" name="tglLahir">  
                                            </div>
                                        </div>                                                        
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label for="pekerjaanTxt" class="form-label">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaanTxt" name="pekerjaan">                            
                                    </div>  
                                     <div class="mb-3">
                                        <label for="alamatTxt" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamatTxt" name="alamat">                            
                                    </div>                                     
                                    <div class="my-3">
                                        <hr>
                                    </div> 
                                    <div class="my-3">
                                        <h5>Akses Akun</h5s>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailTxt" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="emailTxt" name="email">                            
                                    </div>                                     
                                    <div class="mb-3">
                                        <label for="noHPTxt" class="form-label">No. HP</label>
                                        <input type="text" class="form-control" id="noHPTxt" name="hp">                            
                                    </div>
                                    <div class="mb-3">
                                        <label for="passTxt" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="passTxt" name="pass">                            
                                    </div>  
                                    <div class="mb-3">
                                        <label for="pass2Txt" class="form-label">Ulangi Password</label>
                                        <input type="password" class="form-control" id="pass2Txt" name="pass2">                            
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
