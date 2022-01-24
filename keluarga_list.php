<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("partials/head.php"); ?>
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
                                    <th>Waktu</th>
                                    <th>Kelembaban (%)</th>
                                    <th>Berat (kg)</th>
                                    <th>Pompa</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $role = $_SESSION['login_role'];
                                include 'db_access.php';                                         
                                $load = mysqli_query($conn, "SELECT * FROM data_sampah ORDER BY id ASC");   
                                while ($row = mysqli_fetch_array($load)){
                                echo '<tr>';
                                    echo '<td>'.$row['id'].'</td>';
                                    echo '<td>'.$row['waktu'].'</td>';
                                    echo '<td>'.$row['kelembaban'].'</td>';
                                    echo '<td>'.$row['berat'].'</td>';
                                    echo '<td>'.$row['pompa'].'</td>';                     
                                echo '</tr>';
                                $last_id =$row['id']; 
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
    </body>
</html>
