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

        <div class="donors">
            <h1>Blood Donors</h1>
            <div class="all-donor">
                <?php
                require_once "dbcalls.php";

                DonorList('where donor=true');

                ?></div>

        </div>
    </section>

</body>


</html>