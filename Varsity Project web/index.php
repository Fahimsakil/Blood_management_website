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

    <?php
    require_once 'connection.php';
    ?>
    <script type='text/javascript'>
        localStorage.setItem('user', "<?php

                                        if (isset($_SESSION['user'])) {
                                            echo $_SESSION['user'];
                                        } else {
                                            echo '';
                                        } ?>");
    </script>

    <section class="main-contents">
        <div class="carousel">
            <img id='carousel-img'>
        </div>
        <div class="circle1">

        </div>
        <div class="circle2">

        </div>
        <div class="emergency">

            <h1>Emergency Requests</h1>
            <a href='add_blood_request.php'><i class='fa fa-plus'></i>Add</a>
            <div class="emergency-posts">
                <?php
                require_once 'dbcalls.php';
                BloodRequests("where emergency=true");
                ?></div>

            <a href='requests.php'>see all request</a>
        </div>
        <div class="blog">
            <h1>Blog</h1>
            <?php
            require_once 'dbcalls.php';
            Blogs('', 'LIMIT 5');
            ?>
            <a href="blogs.php">see all<a>
        </div>
    </section>
    <section class="footer">

    </section>
</body>


</html>