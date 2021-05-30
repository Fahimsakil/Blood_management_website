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
        <h1>Registration</h1>
        <form method="POST" action='signup.php' class="post-form">
            <label for="username">Username</label>
            <input name='username' type="text" required>
            <label for="fname">First Name</label>
            <input name='fname' type="text">
            <label for="lname">Last Name</label>
            <input name='lname' type="text">
            <label for="phone">Contact</label>
            <input type="tel" placeholder="Phone no" name='phone'>
            <label for="email">Email</label>
            <input name='email' type="email" required>
            <label for="blood-group">Choose Blood Group:</label>
            <select name="blood-group">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
            <label for="password1">Password</label>
            <input name='password1' type="password" required>
            <label for="password2">Confirm Password</label>
            <input name='password2' type="password" required>
            <div class="check">
                <input type="hidden" name='donor' value="0">
                <input type="checkbox" name='donor' value="1">
                <label for="donor">I am a donor</label>
            </div>
            <input class="btn" type="submit">
        </form>
    </div>
</body>
<?php
require_once "connection.php";
function SignUp()
{
    $conn = Connect();

    if (
        isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password1'])
        && isset($_POST['password2']) && isset($_POST['donor']) && isset($_POST['phone'])
    ) {
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
        $donor = $_POST['donor'];
        $phone = $_POST['phone'];
        $blood_group = $_POST['blood-group'];
        if (strcmp($pass1, $pass2) == 0) {
            $pass = $pass1;
        } else {
            die("Passwords dont match");
        }
        $sql = "INSERT INTO users (username,first_name, last_name, email,password, donor,blood_group,phone) VALUES 
    ('$username', '$fname', '$lname', '$email','$pass','$donor','$blood_group',$phone)";

        if (mysqli_query($conn, $sql)) {
            //https://code.tutsplus.com/tutorials/how-to-redirect-with-php--cms-34680
            header("Location: http://127.0.0.1:8000/index.php", TRUE, 301);
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
};

SignUp();
?>

</html>