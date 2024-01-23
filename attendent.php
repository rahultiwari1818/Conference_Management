
<?php

session_start();
    require("./partials/config.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $attendent_type = $_POST["attendentType"];
        if($attendent_type == "presenter"){
            header("location:./presenter.php");
        }
        else if($attendent_type == "participant"){
            header("location:./participant.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./style/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php
        include("./partials/navbar.php");
    ?>

    <main>

        <section class="container border p-5 my-2">
            <form action="#" method="post" id="attendentTypeForm">
                <section class="dropdown">
                   <select name="attendentType" id="attendentType" class="p-3 form-control">
                        <option value="">-- Select Attendent Type --</option>
                        <option value="participant">Participating</option>
                        <option value="presenter">Poster/Paper Presenter</option>
                   </select>
                </section>
            </form>
        </section>
    </main>


    <script src="./script/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./script/jquery.js"></script>
    <script src="./script/script.js"></script>
</body>

</html>