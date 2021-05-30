<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="script.js" defer></script>
    <title>Blood Request</title>
</head>

<body>
    <section class="top">

    </section>
    <div id='signup' class="form-body">
        <h1>Add Blood Requests</h1>
        <form method="POST" action='add_blood_request.php' class="post-form">
            <label for="bag-required">No of required bag</label>
            <input name='bag-required' type="number" min='1' max='5' required>
            <label for="hospital">Hospital Name</label>
            <input name='hospital' type="text" required>
            <label for="hospital-location">Hospital Location</label>
            <input name='hospital-location' type="text" required>
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

            <label for="phone">Contact</label>
            <input type="tel" placeholder="Phone no" name='phone'>
            <div class="check">
                <input type="hidden" name='emergency' value="0">
                <input type="checkbox" name='emergency' value="1">
                <label for="emergency">emergency</label>
            </div>
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

if (
    isset($_POST['bag-required']) && isset($_POST['hospital']) && isset($_POST['hospital-location']) && isset($_POST['blood-group'])
    && isset($_POST['phone']) && isset($_POST['emergency'])
) {
    $bag_required = $_POST['bag-required'];
    $hospital = $_POST['hospital'];
    $location_hospital = $_POST['hospital-location'];
    $blood_group = $_POST['blood-group'];
    $phone = $_POST['phone'];
    $emergency = $_POST['emergency'];
    echo $emergency;
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        $user = 'anonymous';
    }
    $sql = "INSERT INTO blood_donation.blood_request
    (`user`, bag_required, hospital_name, hospital_address, blood_group, contact,emergency)
    VALUES('$user', '$bag_required', '$hospital', '$location_hospital', '$blood_group', '$phone', $emergency)";

    if (mysqli_query($conn, $sql)) {
        //https://code.tutsplus.com/tutorials/how-to-redirect-with-php--cms-34680
        // header("Location: http://127.0.0.1:8000/index.php?msg=success", TRUE, 301);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
};
?>

</html>