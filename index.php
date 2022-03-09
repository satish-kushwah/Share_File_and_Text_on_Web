<?php
session_start();
$showAlert = false;
if (isset($_SESSION['loggedinUpload'])) {
    header('Location: home.php');
}

include 'password.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['password'] == $password) {
        $_SESSION['loggedinUpload'] = true;
        header('Location: home.php');
    } else {
        $showAlert = true;
        $alertClass = "alert-danger";
        $alertMsg = "Wrong password";
    }
}
?>

<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0' crossorigin='anonymous'>
    <link rel="shortcut icon" type="image/x-icon" href="sharelogo.png">
    <title>Share File and Link</title>
</head>

<body>
    <center>
        <?php
        if ($showAlert) {
            echo "<div class='alert $alertClass alert-dismissible fade show py-2 mb-0' role='alert'>
                <strong >$alertMsg</strong>
                <button type='button' class='btn-close pb-2' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }
        ?>
        <div class="mt-5 ">
            <form action="index.php" method="post">
                <input type="password" name="password" class="form-control mb-3 mt-5" style="width: 200px;" placeholder="enter password">
                <button type="submit" class="btn btn-primary " style="width: 200px;">Login </button>
            </form>
        </div>

    </center>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8' crossorigin='anonymous'></script>
</body>

</html>