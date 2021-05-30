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

        <div class="blog">
            <div class="sub-top">
                <h1>Blood Requests</h1>
                <a href='add_blood_request.php'><i class='fa fa-plus'></i>Add a request</a>
                <form method=GET action="requests.php">
                    <label for='ordering'>Sort By:</label>
                    <select name='ordering'>
                        <option value='emergency'>Emergency</option>
                        <option value='bag_required'>Bag Required</option>
                    </select>
                    <input type="submit">
                </form>
            </div>


            <div class="requests"><?php
                                    require_once "dbcalls.php";
                                    if (isset($_GET['ordering'])) {
                                        $ordering = $_GET['ordering'];
                                        if ($ordering == 'emergency') {
                                            BloodRequests('order by emergency desc');
                                        } else if ($ordering == 'bag_required') {
                                            BloodRequests('order by bag_required desc');
                                        }
                                    } else {
                                        BloodRequests();
                                    }

                                    ?>
            </div>

        </div>
    </section>


</body>


</html>