    <?php
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
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="card mb-3" id="form-body">
                    <div class="card-header">
                        Insert Data
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group mt-2">
                                <label>nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Enter Email">
                            </div>
                            <div class="form-group mt-2">
                                <label>Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter Email">
                            </div>
                            <div class="form-group mt-2">
                                <label>Password</label>
                                <input type="text" class="form-control" id="password" placeholder="Enter Email">
                            </div>
                            <div class="form-group mt-2">
                                <label>Jenis akun</label>
                                <select name="jenis" id="jenis" class="form-control">
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

                <table id="tblUser">
                    <thead>
                        <th>Nomer</th>
                        <th>Fullname</th>
                        <th>username</th>
                        <th>jenis</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $key = 1;
                        foreach ((json_decode(ambildata(), true)) as $user) {
                        ?>
                            <tr>
                                <td><?php echo $key++; ?></td>
                                <td><?php echo $user['nama']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php if ($user['jenis'] == 1) {
                                        echo $user['jenis'] = "Admin";
                                    } else {
                                        echo $user['jenis'] = "User";
                                    } ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="admin.php?id=<?= $user['id']; ?>"><i class="fa fa-pencil-square-o" name="edit"></i></a>
                                    <a onClick="return confirm ('Question is : <?= $user['id'] ?>')" href="http://localhost:8080/api/emp/delete.php?id=<?php echo $user['id']; ?>" id="hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a href="admin.php" class="btn btn-dark">Kembali</a>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
        <script>
            jQuery(document).ready(function($) {
                $('#tblUser').DataTable();
                $("#form-body").hide();

                $("#insert-btn").on('click', function() {
                    $("#form-body").toggle(500);
                });


                $("#submit").on('click', function(e) {
                    e.preventDefault();

                    var nama = $('#nama').val();
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var jenis = $('#jenis').val();

                    $.ajax({
                        url: "http://localhost:8080/api/emp/create.php",
                        type: "POST",
                        data: {
                            nama: nama,
                            username: username,
                            password: password,
                            jenis: jenis
                        },
                        success: function(data) {
                            alert("Data Inserted Successfully");
                            $("#form-body").hide();
                            location.reload(true);
                        }
                    });

                });

            });
        </script>

    </body>

    </html>