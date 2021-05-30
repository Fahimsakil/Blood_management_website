<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="script.js" defer></script>
    <title>Document</title>
</head>

<body>
    <section class="top">

    </section>

    <section class="main-contents">
        <div class="user">

            <?php
            require_once "dbcalls.php";
            $user = $_SESSION['user'];
            ?>
            <div class="user-requests">
                <a href='add_blood_request.php'><i class='fa fa-plus'></i>Add</a>
                <?php
                BloodRequests("where user='$user'");
                ?>
            </div>
            <div class="user-blogs">
                <?php
                Blogs(" where author='$user'", '');
                ?>
            </div>

            <div class="user-details">

                <?php

                User(" where username='$user'");
                ?>
            </div>

        </div>
    </section>

</body>


</html>