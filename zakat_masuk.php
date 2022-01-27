<?php  
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("location:index.php");
        die();        
    }else{
     
        $user_check = $_SESSION['login_user'];
        $user_role = $_SESSION['login_role'];   
        $user_nik = $_SESSION['login_nik'];           
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
                                <h1 class="my-4">Zakat</h1>                                  
                            </div>
                            <div class="col-md-6">                               
                                 <a class="btn btn-success btn-sm my-4 float-end start-100 top-50" href="form/add_zakat.php?nik=<?php echo $user_nik; ?>">Beri Zakat</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">                                                 
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>                                     
                                            <th>NIK</th>
                                            <th>Token</th>
                                            <th>Waktu</th>
                                           
                                            <th>Jumlah</th>    
                                            <th>Status</th>
                                                                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        // $role = $_SESSION['login_role'];
                                        include 'global/db_access.php';                                         
                                        $load = mysqli_query($conn, "SELECT * FROM log_masuk ORDER BY masuk_id ASC"); 
                                        // if($load){
                                            while ($row = mysqli_fetch_array($load)){
                                                echo '<tr>';
                                                    echo '<td>'.$row['masuk_id'].'</td>';                                                    
                                                    echo '<td>'.$row['nik'].'</td>';
                                                    echo '<td>'.$row['token'].'</td>';                                                    
                                                    echo '<td>'.$row['waktu'].'</td>';                                                                                             
                                                    echo '<td>'.$row['jumlah'].' kg</td>'; 
                                                    
                                                    $buttonType = "btn-primary";
                                                    $buttonRef = '';
                                                    if($row['status'] == 'Selesai'){
                                                        $buttonType = 'btn-success';
                                                    }else if($row['status'] == 'Menunggu'){
                                                        $buttonType = 'btn-warning';
                                                        $buttonRef = '#zakatModal';
                                                    }
                                                    
                                                    echo '<td>
                                                    <button id="validasiBtn" type="button" class="btn '.$buttonType.' btn-sm" data-nik="'.$row['nik'].'" data-token="'.$row['token'].'" data-bs-toggle="modal" data-bs-target="'.$buttonRef.'">
                                                    '.$row['status'].'
                                                    </button>
                                                </td>';                                                                                  
                                                echo '</tr>';                                
                                            }   
                                        // }                                  
                                        
                                    ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="modal fade" id="zakatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Validasi Zakat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="form/validasi_zakat.php" method="POST">
                                <div class="modal-body">                                                      
                                    <div class="mb-3">
                                        <label for="nikTxt" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="nikTxt" name="nik">                            
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="tokenTxt" class="form-label">Token</label>
                                        <input type="text" class="form-control" id="tokenTxt" name="token">                            
                                    </div> 
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="berasTxt" class="form-label">Jumlah Beras (Kg)</label>
                                                <input type="text" class="form-control" id="berasTxt" name="beras"> 
                                            </div>
                                            
                                        </div>                                                        
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
                    //triggered when modal is about to be shown
                    $('#zakatModal').on('show.bs.modal', function(e) {

                            //get data-id attribute of the clicked element
                            var nik = $(e.relatedTarget).data('nik');
                            var token = $(e.relatedTarget).data('token');

                            //populate the textbox
                            $(e.currentTarget).find('input[name="nik"]').val(nik);
                            $(e.currentTarget).find('input[name="token"]').val(token);
                        });
                    } );
        </script>
    </body>
</html>
