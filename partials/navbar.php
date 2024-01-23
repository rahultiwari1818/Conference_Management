<?php

?>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <section class="container-fluid">
        <a class="navbar-brand" href="#">Conference</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <section class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="btn btn-success mx-3" aria-current="page" href="./attendent.php">Home</a>
                </li>
                <li class="nav-item">
                    
                </li>
         
                <?php
                if (isset($_SESSION["isLoggedIn"]) &&$_SESSION["isLoggedIn"] ){
                    echo "
                    <li class='nav-item'>
                        <a class=' btn btn-success mx-3' aria-current='page' href='./viewParticipants.php' >View Participants</a>
                    </li>
                    ";
                    echo "
                        <li class='nav-item'>
                        <a class=' btn btn-danger mx-3' aria-current='page' href='./logout.php' >Logout</a>
                    </li>
                        ";
                }
                else{
                    echo "
                    <li class='nav-item'>
                    <a class=' btn btn-warning mx-3 ' aria-current='page' href='./login.php'>Admin Login</a>
                </li>
                    ";
                }
                ?>
            </ul>

        </section>
    </section>
</nav>