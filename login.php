<?php
session_start();
require("./partials/config.php");

if (isset($_POST["loginAdmin"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE admin_email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["admin_password"];

        // Verify the entered password with the hashed password
        if (!password_verify($password, $hashedPassword)) {
            // Password is correct, perform login actions here
            $_SESSION["admin_email"] = $email;
            $_SESSION["isLoggedIn"] = true;
            header("location: ./attendent.php");
            exit(); // Always exit after redirect
        } else {
            // Incorrect password
            echo '<script>alert("Incorrect password. Please try again.");</script>';
        }
    } else {
        // No user found with the given email
        echo '<script>alert("No admin found with the provided email.");</script>';
    }

    $stmt->close(); // Close the prepared statement
}

$conn->close(); // Close the database connection


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
</head>
<body class="bg-primary">
    <?php
        include("./partials/navbar.php");
    ?>
<main class="container border mt-3 p-3 bg-white">
        <h1 class="text-center ">Admin Login</h1>
        <section class="m-3 p-3">
            <form action="#" method="post" class="border">
                <section class="m-3 p-3">
                    <label for="email">Admin Email : </label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Admin Email">
                </section>
              <section class="m-3 p-3">
                    <label for="passwd">Admin Password : </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Admin Password">
                </section>
                <section class="px-3 my-3 d-grid">
                    <input type="submit" value="Login" name="loginAdmin" class=" btn-block btn btn-warning">
                </section>
            </form>
        </section>

    <script src="./script/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./script/jquery.js"></script>
    <script src="./script/script.js"></script>

</body>
</html>