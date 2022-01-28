<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - BeRice</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">BeRice</h3></div>
                                    <div class="card-body">
                                        <form action="form/exec_login.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail"  name="user" />
                                                <label for="inputEmail">Email / No. HP</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pass" />
                                                <label for="inputPassword">Password</label>
                                            </div>                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">                                                
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"  data-bs-toggle="modal" data-bs-target="#userModal"><a href="#"> Daftar akun user baru!</a></div>
                                    </div>
                                </div>
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
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
