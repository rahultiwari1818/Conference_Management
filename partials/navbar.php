<?php

?>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow">
  <div class="container justify-content-center">
    <a class="navbar-brand mx-3" href="https://www.daiict.ac.in/">
      <img src="./assets/dau-logo.jpg" alt="logo" height="70" width="90">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="btn text-primary  mx-2" href="#registration-section">Registration</a>
        </li>
        <li class="nav-item">
          <a class="btn text-primary  mx-2" href="#speakers-section">Speakers</a>
        </li>
        <li class="nav-item">
          <a class="btn text-primary  mx-2" href="#committee-section">Committee</a>
        </li>


      </ul>
    </div>
  </div>
</nav> -->


<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-3 custom-navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="https://www.daiict.ac.in/">
            <img src="./assets/dau-logo.jpg" alt="logo" height="60" class="me-2">
            <div class="logo-text d-none d-md-block">
                <h6 class="mb-0 fw-bold text-primary">Dhirubhai Ambani University</h6>
            </div>
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <div class="hamburger-lines navbar-toggler-icon">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center gap-3">
                <li class="nav-item">
                    <a class="nav-link custom-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="#registration-section">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="#invited-speakers-section">Speakers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="#committee-section">Committee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-link" href="#sponsors-section">Sponsors</a>
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