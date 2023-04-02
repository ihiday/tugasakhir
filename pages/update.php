<?php
$homepage = file_get_contents('http://localhost:8080/api/emp/read.php?id=' . $_GET['id']);
foreach (json_decode($homepage, true) as $data) {
    $nama = $data['nama'];
    $username = $data['username'];
    $password = $data['password'];
    $jenis = $data['jenis'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container-fluid" style="margin-top:30px !important;">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-9">
                    <h1>Kelola Akun Pengguna</h1>
                </div>
                <div class="col-md-3">
                    <button type="button" id="insert-btn" class="btn btn-primary" style="float: right;">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="card mb-3" id="form-body">
                <div class="card-header">
                    Insert Data
                </div>
                <div class="card-body">
                    <form method="POST" action="http://localhost:8080/api/emp/update.php">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        <div class="form-group mt-2">
                            <label>nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Enter Email" value="<?= $nama; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Email" value="<?= $username; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Enter Email" value="<?= $password; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Jenis akun</label>
                            <select name="jenis" name="jenis" class="form-control">
                                <option value="1">Admin</option>
                                <option value="0" selected>Green</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2" id="submit">Submit</button>
                    </form>
                </div>
            </div>

            <?php
            // require_once('../db_conn.php');
            // $sql = "SELECT * FROM users where jenis > 0 ";
            // $result = mysqli_query($conn, $sql);
            // $key = 1;
            ?>

        </div>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <a href="admin.php" class="btn btn-dark">Kembali</a>
        </div>
    </div>
</body>

</html>