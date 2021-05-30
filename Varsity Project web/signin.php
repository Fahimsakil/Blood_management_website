<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="script.js" defer></script>
    <title>Login</title>
</head>

<body>
    <section class="top">

    </section>
    <div id='signin' class="form-body">
        <h1>Login</h1>
        <form method="POST" class="post-form">
            <label for="username">Username</label>
            <input name='username' type="username">
            <label for="password">Password</label>
            <input name='password' type="password">
            <input class="btn" type="submit">
        </form>
    </div>
</body>

<?php
session_start();
$server = "localhost";
$user = "root";
$password = '';
$database = 'blood_donation';

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (empty($_SESSION['user'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $pass = trim($_POST['password']);
        $sql = "SELECT * FROM users where username='$username' and password = '$pass'";
        $result = mysqli_query($conn, $sql);
        $no_row = mysqli_num_rows($result);
        if ($no_row == 1) {
            $_SESSION['user'] = $username;

            header("Location: http://127.0.0.1:8000/index.php");
        } else {
            echo $result;
        }
    };
} else {
    header("Location: http://127.0.0.1:8000/index.php");
}

?>

</html>