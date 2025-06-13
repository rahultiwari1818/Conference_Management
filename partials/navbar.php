<?php

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow">
  <div class="container justify-content-center">
    <!-- Logo -->
    <a class="navbar-brand mx-3" href="https://www.daiict.ac.in/">
      <img src="./assets/dau-logo.jpg" alt="logo" height="70" width="90">
    </a>

    <!-- Toggler for mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar content -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="btn btn-success mx-2" href="./attendent.php">Home</a>
        </li>

        <!-- <?php
        if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
          echo '
            <li class="nav-item">
              <a class="btn btn-success mx-2" href="./viewParticipants.php">View Participants</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-danger mx-2" href="./logout.php">Logout</a>
            </li>
          ';
        } else {
          echo '
            <li class="nav-item">
              <a class="btn btn-warning mx-2" href="./login.php">Admin Login</a>
            </li>
          ';
        }
        ?> -->
      </ul>
    </div>
  </div>
</nav>
