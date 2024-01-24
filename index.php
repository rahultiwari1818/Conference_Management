<?php
 require("./partials/config.php");

 // Check if there are any existing admin records
 $queryCheckAdmin = "SELECT * FROM tbl_admin";
 $resultCheckAdmin = $conn->query($queryCheckAdmin);
 
 if ($resultCheckAdmin->num_rows > 0) {
     header("location: ./attendent.php");
     exit(); // Always exit after redirect
 }
 
 try {
     if (isset($_POST["completeSetUp"]) && $_POST["completeSetUp"] == "Finish Set Up") {
         $password = $_POST["password"];
         $name = $_POST["name"];
         $email = $_POST["email"];
         $passwordHash = password_hash($password, PASSWORD_DEFAULT);
 
         // Use prepared statement to prevent SQL injection
         $stmt = $conn->prepare("INSERT INTO tbl_admin (`ad_id`, `admin_name`, `admin_email`, `admin_password`) VALUES ('admin1', ?, ?, ?)");
         $stmt->bind_param('sss', $name, $email, $passwordHash);
 
         if ($stmt->execute()) {
             ?>
             <script>
                 alert("System Set Up Successfully!");
             </script>
             <?php
             header("location: ./attendent.php");
             exit(); // Always exit after redirect
         } else {
             echo "Error: " . $stmt->error;
         }
 
         $stmt->close(); // Close the prepared statement
     }
 } catch (\Throwable $th) {
     // Handle exceptions appropriately
     echo $th->getMessage();
 }
 
 $conn->close(); // Close the database connection
 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
</head>
<body class="bg-primary">

    <main class="container border mt-3 p-3 bg-white">
        <h1 class="text-center ">Set Up Admin Account</h1>
        <section class="m-3 p-3">
            <form action="#" method="post" class="border">
            <section class="m-3 p-3">
                    <label for="name">Admin Name : </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Admin Name">
                </section>    
                <section class="m-3 p-3">
                    <label for="email">Admin Email : </label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Admin Email">
                </section>
              <section class="m-3 p-3">
                    <label for="passwd">Admin Password : </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Admin Password">
                </section>
                <section class="px-3 my-3 d-grid">
                    <input type="submit" value="Finish Set Up" name="completeSetUp" class=" btn-block btn btn-warning">
                </section>
            </form>
        </section>
    </main>

    <script src="./script/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./script/jquery.js"></script>
    <script src="./script/script.js"></script>

    <script>
    $(document).ready(function () {
        $('form').submit(function (event) {
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();

            // Simple validation checks for Admin Name and Email
            if (name.trim() === '') {
                alert('Admin Name is required.');
                event.preventDefault();
                return;
            }

            if (!isValidName(name)) {
                alert('Admin Name should only contain letters and spaces.');
                event.preventDefault();
                return;
            }

            if (email.trim() === '') {
                alert('Admin Email is required.');
                event.preventDefault();
                return;
            }

            // Password validation
            if (!isValidPassword(password)) {
                alert('Password should contain at least one lowercase letter, one uppercase letter, one special character, one number, and have a minimum length of 6 characters.');
                event.preventDefault();
                return;
            }
        });

        function isValidName(name) {
            // Admin Name should only contain letters and spaces
            var regex = /^[a-zA-Z\s]+$/;
            return regex.test(name);
        }

        function isValidPassword(password) {
            // Password should contain at least one lowercase letter, one uppercase letter, one special character, one number, and have a minimum length of 6 characters
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&]).{6,}$/;

            return regex.test(password);
        }
    });
</script>
</body>

</html>