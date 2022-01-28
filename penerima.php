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
                                <h1 class="my-4">Daftar Penerima</h1>                                  
                            </div>
                            <div class="col-md-6">                               
                                <button class="btn btn-success btn-sm my-4 float-end start-100 top-50" data-bs-toggle="modal" data-bs-target="#penerimaModal">Tambah Penerima</button>                                
                            </div>
                        </div>                  
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Card ID</th>   
                                    <th>NIK</th>
                                    <th>No. KK</th>
                                    <th>Nama</th>                                  
                                   
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat, Tanggal lahir</th>
                                    <th>Alamat</th>
                                    <th>Pekerjaan</th>                                   
                                    <th>No. HP</th>                                                                       
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
                                    echo '<td>'.$row['card_id'].'</td>';     
                                    echo '<td>'.$row['nik'].'</td>';
                                    echo '<td>'.$row['no_kk'].'</td>';
                                    echo '<td>'.$row['nama'].'</td>';                                  
                                   
                                    echo '<td>'.$row['jenis_kelamin'].'</td>';
                                    $date=date_create($row['tgl_lahir']);
                                    $tLahir = date_format($date,"d/m/Y ");
                                  
                                    echo '<td>'.$row['t4_lahir'].','.$tLahir .'</td>';                                                    
                                    echo '<td>'.$row['alamat'].'</td>';    
                                    echo '<td>'.$row['pekerjaan'].'</td>';                                   
                                    echo '<td>'.$row['no_hp'].'</td>';                                   
                                    echo '<td>
                                        <button type="button" class="btn btn-primary btn-sm" data-lahir="'.$tLahir.'" data-card="'.$row['card_id'].'" data-bs-toggle="modal" data-bs-target="#editModal">
                                            Update
                                        </button>
                                    </td>';                               
                                echo '</tr>';                                
                                }   
                            ?>
                            </tbody>
                        </table>   
                    </div>
                    <div class="modal fade" id="penerimaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data Penerima Baru</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="form/add_penerima.php" method="POST">
                            <div class="modal-body">   
                                <div class="mb-3">
                                    <label for="cardTxt" class="form-label">Card Id</label>
                                    <input type="text" class="form-control" id="cardTxt" name="card">                            
                                </div>
                                <div class="mb-3">
                                    <label for="nikTxt" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nikTxt" name="nik">                            
                                </div>
                                <div class="mb-3">
                                    <label for="kkTxt" class="form-label">No. KK</label>
                                    <input type="text" class="form-control" id="kkTxt" name="kk">                            
                                </div>
                                <div class="mb-3">
                                    <label for="namaTxt" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namaTxt" name="nama">                            
                                </div>                                                                            
                                <div class="mb-3">
                                    <label for="jkTxt" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" aria-label="Jenis Kelamin" name="jk">                                
                                        <option value="Laki-Laki" selected>Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>                                
                                    </select>
                                    <!-- <input type="text" class="form-control" id="jkTxt" name="jk">                             -->
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
                                    <label for="alamatTxt" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamatTxt" name="alamat">                            
                                </div>
                                <div class="mb-3">
                                    <label for="noHPTxt" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" id="noHPTxt" name="hp">                            
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaanTxt" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaanTxt" name="pekerjaan">                            
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

                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="form/edit_penerima.php" method="POST">
                            <div class="modal-body">   
                                <div class="mb-3">
                                    <label for="cardTxt" class="form-label">Card Id</label>
                                    <input type="text" class="form-control" id="cardTxt" name="card">                            
                                </div>
                                <div class="mb-3">
                                    <label for="nikTxt" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nikTxt" name="nik">                            
                                </div>
                                <div class="mb-3">
                                    <label for="kkTxt" class="form-label">No. KK</label>
                                    <input type="text" class="form-control" id="kkTxt" name="kk">                            
                                </div>
                                <div class="mb-3">
                                    <label for="namaTxt" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namaTxt" name="nama">                            
                                </div>                                                                            
                                <div class="mb-3">
                                    <label for="jkTxt" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" aria-label="Jenis Kelamin" name="jk">                                
                                        <option value="Laki-Laki" selected>Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>                                
                                    </select>
                                    <!-- <input type="text" class="form-control" id="jkTxt" name="jk">                             -->
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
                                    <label for="alamatTxt" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamatTxt" name="alamat">                            
                                </div>
                                <div class="mb-3">
                                    <label for="noHPTxt" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" id="noHPTxt" name="hp">                            
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaanTxt" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaanTxt" name="pekerjaan">                            
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

                    $('#editModal').on('show.bs.modal', function(e) {

                        //get data-id attribute of the clicked element
                        let card = $(e.relatedTarget).data('card'); 
                        let lahir = $(e.relatedTarget).data('lahir'); 
                        let penerima;               

                        $.get( "api/get_penerima.php", { card : card } )
                            .done(function( data ) {
                                // alert( "Data Loaded: " + data );
                                let dataHasil = JSON.parse(data);
                                
                                if(dataHasil.result == 'success'){
                                    penerima = dataHasil.data;
                                    let tglLahir =penerima.tgl_Lahir;
                                    // let changeForm = Date.parse(tglLahir).format('dd/mm/yyyy');
                                    // console.log(changeForm);
                                    // alert(penerima.card_id);
                                    $(e.currentTarget).find('input[name="nik"]').val(penerima.nik);
                                    $(e.currentTarget).find('input[name="kk"]').val(penerima.no_kk);
                                    $(e.currentTarget).find('input[name="nama"]').val(penerima.nama);
                                    $(e.currentTarget).find('option[value="'+penerima.jenis_kelamin+'"]').attr("selected",true);
                                    $(e.currentTarget).find('input[name="t4Lahir"]').val(penerima.t4_lahir);
                                    console.log(lahir);
                                    $(e.currentTarget).find('input[name="tglLahir"]').val(lahir);
                                   
                                    $(e.currentTarget).find('input[name="hp"]').val(penerima.no_hp);
                                    $(e.currentTarget).find('input[name="pekerjaan"]').val(penerima.pekerjaan);
                                    $(e.currentTarget).find('input[name="alamat"]').val(penerima.alamat);
                                    
                                }
                            });
                        //populate the textbox
                        $(e.currentTarget).find('input[name="card"]').val(card);
                            // $(e.currentTarget).find('input[name="token"]').val(token);
                    });
                } );
              
        </script>
    </body>
</html>
