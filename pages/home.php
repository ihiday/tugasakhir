<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <?php if ($_SESSION['jenis'] > 0) { ?>
            <!-- For Admin -->
            <?php header("location:admin.php") ?>
        <?php } else if ($_SESSION['jenis'] == 0) { ?>
            <!-- FORE USERS -->
            <?php header("location:user.php") ?>
        <?php } ?>
    </div>
</body>

</html>