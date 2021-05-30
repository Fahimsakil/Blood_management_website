
            <?php

            require_once 'connection.php';

            function Blogs($query1 = '', $query2 = '')
            {
                $conn = Connect();
                if (isset($_SESSION['user'])) {
                    echo "<a href='add_blog.php'><i class='fa fa-plus' ></i>Add</a>";
                }
                $sql_blog = "SELECT * FROM `blood_donation`.`blog` " . $query1 . " order by id desc " . $query2;
                $result = mysqli_query($conn, $sql_blog);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo  "<div class='single-blog'>";
                        echo "<h4>" . $row['title'] . "</h4> ";
                        echo "<h5>" . $row['body'] . "</h5>";
                        echo "<h6> by: " . $row['author'] . "</h6>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
            }

            function BloodRequests($query = '')
            {
                $conn = Connect();
                $sql_blog = "SELECT * FROM `blood_donation`.`blood_request` " . $query;
                $result = mysqli_query($conn, $sql_blog);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo  "<div class='single-request'>";
                        if ($row['emergency'] == true) {
                            echo "<div class='emergency-sign'></div>";
                            echo "<h1>Emergency</h1>";
                        }

                        echo "<h5>Bag Required: " . $row['bag_required'] . "</h5> ";
                        echo "<h5>Bag Managed: " . $row['bag_managed'] . "</h5>";
                        echo "<h5>Hospital: " . $row['hospital_name'] . "</h5>";
                        echo "<h5>Hospital Address: " . $row['hospital_address'] . "</h5>";
                        echo "<h5>Request by: " . $row['user'] . "</h5>";
                        echo "<h5>Contact: " . $row['contact'] . "</h5>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
            }

            function DonorList($query = '')
            {
                $conn = Connect();
                $sql_blog = 'SELECT * FROM `blood_donation`.`users`' . $query;
                $result = mysqli_query($conn, $sql_blog);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo  "<div class='single-request'>";
                        echo "<h5>Request By: " . $row['username'] . "</h5> ";
                        echo "<h5>Blood Group: " . $row['blood_group'] . "</h5> ";
                        echo "<h5>phone no: " . $row['phone'] . "</h5>";
                        echo "<h5>Email: " . $row['email'] . "</h5>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
            }
            function User($query = '')
            {
                $conn = Connect();
                $sql_blog = 'SELECT * FROM `blood_donation`.`users` ' . $query;
                $result = mysqli_query($conn, $sql_blog);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo  "<div class='userinfo'>";
                        echo "<h5>" . $row['username'] . "</h5> ";
                        echo "<h5>" . $row['blood_group'] . "</h5> ";
                        echo "<h5>" . $row['phone'] . "</h5>";
                        echo "<h5>" . $row['email'] . "</h5>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
            }
            ?>