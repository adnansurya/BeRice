<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("partials/head.php"); ?>
        <title>Penerima Baru - BeRice</title>
    </head>
    <body class="sb-nav-fixed">
        <?php include("partials/topbar.php"); ?>
        <div id="layoutSidenav">
            <?php include("partials/leftbar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="my-4">Penerima Baru</h1>                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-grid gap-2" data-bs-toggle="modal" data-bs-target="#kkModal">
                                    <button class="btn btn-success btn-lg my-3">Tambah KK <br></button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-grid gap-2" data-bs-toggle="modal" data-bs-target="#penerimaModal">
                                    <button class="btn btn-success btn-lg my-3">Tambah Penerima</button>
                                </div>
                            </div>
                        </div>
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
                            <label for="namaTxt" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namaTxt" name="nama">                            
                        </div>                 
                        <div class="mb-3">
                            <label for="nikTxt" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nikTxt" name="nik">                            
                        </div>
                        
                        <div class="mb-3">
                            <label for="jkTxt" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jkTxt" name="jk">                            
                        </div> 
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="t4lahirTxt" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="t4lahirTxt" name="t4Lahir"> 
                                </div>
                                <div class="col-6">
                                    <label for="tglLahirxt" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tglLahirTxt" name="tglLahir">  
                                </div>
                            </div>                                                        
                        </div>
                        <div class="mb-3">
                            <label for="noHPTxt" class="form-label">No. HP</label>
                            <input type="text" class="form-control" id="noHPTxt" name="hp">                            
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaanTxt" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaanTxt" name="pekerjaan">                            
                        </div>
                        <div class="mb-3">
                            <label for="pendidikanTxt" class="form-label">Pendidikan</label>
                            <input type="text" class="form-control" id="pendidikanTxt" name="pendidikan">                            
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
    </body>
</html>
