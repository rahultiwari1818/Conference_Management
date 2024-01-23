<?php
session_start();
require("./partials/config.php");

if (!isset($_SESSION["isLoggedIn"])) {
    header("location:./attendent.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Participants</title>
    <link rel="stylesheet" href="./style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body class="">
    <?php
    include("./partials/navbar.php");
    ?>
    <main class="container mt-3 p-3">
        <table class="table table-dark table-striped table-bordered">
            <thead>
                <tr>
                    <th>Reg Id</th>
                    <th>Attendent Type</th>
                    <th>Track</th>
                    <th>Paper Title</th>
                    <th>Paper Abstract</th>
                    <th>Paper</th>
                    <th>First Author Email</th>
                    <th>First Author Salutation</th>
                    <th>First Author Name</th>
                    <th>First Author Institute Name</th>
                    <th>First Author Register As</th>
                    <th>First Author Designation</th>
                    <th>First Author Gender</th>
                    <th>First Author Mobile</th>
                    <th>First Author Address</th>
                    <th>First Author Photo</th>
                    <th>Second Author Email</th>
                    <th>Second Author Salutation</th>
                    <th>Second Author Name</th>
                    <th>Second Author Institute Name</th>
                    <th>Second Author Register As</th>
                    <th>Second Author Designation</th>
                    <th>Second Author Gender</th>
                    <th>Second Author Mobile</th>
                    <th>Second Author Address</th>
                    <th>Second Author Photo</th>
                    <th>Third Author Email</th>
                    <th>Third Author Salutation</th>
                    <th>Third Author Name</th>
                    <th>Third Author Institute Name</th>
                    <th>Third Author Register As</th>
                    <th>Third Author Designation</th>
                    <th>Third Author Gender</th>
                    <th>Third Author Mobile</th>
                    <th>Third Author Address</th>
                    <th>Third Author Photo</th>
                    <th>Payment Id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "select * from tbl_attendents";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            // Loop through each column and display the data
                            foreach ($row as $key => $value) {
                                // echo $key;
                                // echo "<br>";

                                if($key=="paper_abstract"){
                                    if($value==null){
                                        echo "<td><a href='#' class='btn btn-success' disabled>Download Abstract</a></td>";

                                    }
                                    else{

                                        echo "<td><a href='".$value."' class='btn btn-success' download>Download Abstract</a></td>";
                                    }
                                }
                                else if($key == "paper"){
                                    if($value==null){
                                        echo "<td><a href='#' class='btn btn-success' disabled>Download Paper</a></td>";

                                    }
                                    else{

                                        echo "<td><a href='".$value."' class='btn btn-success' download>Download Paper</a></td>";
                                    }

                                }
                                else if($key == "first_author_photo"){
                                    if($value==null){
                                        echo "<td><a href='#' class='btn btn-success' disabled>Download Photo</a></td>";

                                    }
                                    else{
                                        // echo $value;
                                        echo "<td><a href='".$value."' class='btn btn-success' download>Download Photo</a></td>";
                                    }

                                }                                    
                                else if($key == "second_author_photo"){
                                    if($value==null){
                                        echo "<td><a href='#' class='btn btn-success' disabled>Download Photo</a></td>";

                                    }
                                    else{

                                        echo "<td><a href='".$value."' class='btn btn-success' download>Download Photo</a></td>";
                                    }

                                }                                   
                                else if($key == "third_author_photo"){
                                    if($value==null){
                                        echo "<td><a href='#' class='btn btn-success' disabled>Download Photo</a></td>";

                                    }
                                    else{

                                        echo "<td><a href='".$value."' class='btn btn-success' download>Download Photo</a></td>";
                                    }

                                }
                                else{
                                    echo "<td>" . $value . "</td>";
                                }
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='36'>No data available</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>

    <script src="./script/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./script/jquery.js"></script>
    <script src="./script/script.js"></script>
</body>

</html>