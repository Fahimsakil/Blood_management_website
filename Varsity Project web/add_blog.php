<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="script.js" defer></script>
    <title>Registration</title>
</head>

<body>
    <section class="top">

    </section>
    <div id='signup' class="form-body">
        <h1>Add Blog</h1>
        <form method="POST" action='add_blog.php' class="post-form-blog">
            <label for="title">Title</label>
            <input name='title' type="text" required>
            <label for="body">Content</label>
            <textarea id='blog-body' name='blog-body' required></textarea>
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

if (isset($_POST['title']) && isset($_POST['blog-body'])) {

    $body = $_POST['blog-body'];
    $title = $_POST['title'];
    $user = $_SESSION['user'];
    $sql = "INSERT INTO blog (title,author,body) VALUES ('$title', '$user', '$body')";

    if (mysqli_query($conn, $sql)) {
        //https://code.tutsplus.com/tutorials/how-to-redirect-with-php--cms-34680
        header('location:http://127.0.0.1:8000/index.php?msg=success');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
};
?>

</html>