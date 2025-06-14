<?php
session_start();
require("./partials/config.php");

                        $API_KEY =  "''";
                        
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
        $query = "SELECT reg_id FROM tbl_attendents ORDER BY reg_id DESC LIMIT 1";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $regId = $row['reg_id'];
            $numericPart = (int)substr($regId, 3);
            $numericPart += 1;
        } else {
            $numericPart = 1;
        }

        $uploadDir = "./uploads/photos/";
        $regId = "atd" . $numericPart;
        $first_author_email = $_POST["email"];
        $first_author_salutation = $_POST["salutation"];
        $first_author_name = $_POST["name"];
        $first_author_institute_name = $_POST["institute_name"];
        $first_author_register_as = $_POST["participantType"];
        $first_author_designation = $_POST["designation"];
        $first_author_gender = $_POST["gender"];
        $first_author_mobile = $_POST["phno"];
        $payment_id = $_POST["paymentId"];
        $photo_url =  $regId . "_" . $_FILES["photo"]["name"];
        $address = addslashes($_POST["address"]);
        $attendent_type="Participant";
        $targetPath = $uploadDir . $photo_url;

        // Using prepared statement for inserting data
        $stmt = $conn->prepare("INSERT INTO tbl_attendents (reg_id, attendent_type, first_author_email, first_author_salutation, first_author_name, first_author_institute_name,
            first_author_register_as, first_author_designation, first_author_gender, first_author_mobile, first_author_address, first_author_photo, payment_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('sssssssssssss', $regId, $attendent_type, $first_author_email, $first_author_salutation, $first_author_name, $first_author_institute_name,
            $first_author_register_as, $first_author_designation, $first_author_gender, $first_author_mobile, $address, $targetPath, $payment_id);

        $targetPath = $uploadDir . $regId . "_" . $_FILES["photo"]["name"];

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPath) && $stmt->execute()) {
            ?>
            <script>
                alert("Registered Successfully");
            </script>
            <?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Registration</title>
    <link rel="stylesheet" href="./style/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php
    include("./partials/navbar.php");
    ?>

    <main class="container my-2 p-3">
        <section class="mt-4 p-5 bg-primary text-white rounded">

            <form action="#" method="post" id="participantForm" enctype="multipart/form-data" class="p-3 border">
                <section class="px-3 my-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                </section>
                <section class="px-3 my-3">
                    <label for="pt">You Want to Register As:</label>
                    <select name="participantType" id="participantType" class="p-1 form-control" required>
                        <option value="">-- Select Participant Type --</option>
                        <option value="research_scholar">Research Scholar</option>
                        <option value="foreign_delegates">Foreign Delegates</option>
                        <option value="academician">Academician</option>
                        <option value="industrialist">Industrialist</option>
                        <option value="ug_pg_students">UG/PG Students</option>
                    </select>
                </section>
                <section class="px-3 my-3">
                    <label for="salutation">Your Salutation:</label>
                    <select name="salutation" id="salutation" class="p-1 form-control" required>
                        <option value="">-- Select Your Salutation --</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Prof.">Prof.</option>
                        <!-- <option value="Prin.">Prin.</option>
                        <option value="Prof.Dr.">Prof.Dr.</option>
                        <option value="I/c. Prin.">I/c. Prin.</option>
                        <option value="Prin. Dr.">Prin. Dr.</option>
                        <option value="I/c. Prin. Dr.">I/c. Prin. Dr.</option> -->
                    </select>
                </section>
                <!-- <section class="px-3 my-3">

                    <label for="name">Full Name: (for Certificate purpose) </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Full Name"
                        required>
                </section> -->

                <section class="px-3 my-3">

                    <label for="institute_name">Esteemed Institute Name: (for Certificate purpose) </label>
                    <input type="text" name="institute_name" id="institute_name" class="form-control"
                        placeholder="Enter Institute Name" required>
                </section>

                <section class="px-3 my-3">

                    <label for="Designation">Designation: (for Certificate purpose) </label>
                    <input type="text" name="designation" id="designation" class="form-control"
                        placeholder="Enter Designation" required>
                </section>
                <section class="px-3 my-3">
                    <label for="address">We can meet (Address)</label>
                    <textarea name="address" id="address" cols="30" rows="10" class="form-control" required></textarea>
                </section>
                <section class="px-3 my-3">
                    <label for="gender"> Gender :</label>
                    <section class="form-group">
                        <label for="maleRadio">Male</label>
                        <input type="radio" class="form-check-input" id="maleRadio" name="gender" value="male" required>

                        <label for="femaleRadio">Female</label>
                        <input type="radio" class="form-check-input" id="femaleRadio" name="gender" value="female"
                            required>

                        <label for="transgenderRadio">Transgender</label>
                        <input type="radio" class="form-check-input" id="transgenderRadio" name="gender"
                            value="transgender" required>
                    </section>
                </section>
                <section class="px-3 my-3">
                    <label for="phno">Phone Number:</label>
                    <input type="tel" name="phno" id="phno" placeholder="Enter Phone Number" class="form-control"
                        required>
                </section>
                <section class="px-3 my-3 custom-file">
                    <label class="custom-file-label" for="photo">Upload Passport Photograph ( for certificate):</label>
                    <input type="file" class="custom-file-input" name="photo" id="photo" accept="image/*" required>
                </section>
                <!-- <section class="px-3 my-3">
                    <label for="confrimation">The above information is true and best of my knowledge and gives my
                        concern for the certificate.</label>
                    <br>
                    <input type="radio" name="confirmation" id="confirmation" class="mx-3" required>
                    <span>Yes, I agree </span>
                </section> -->
                <section class="px-3 my-3 d-grid">
                    <button type="button" id="pay_now" class="btn btn-block btn-warning">Pay Now</button>
                </section>
            </form>
        </section>
    </main>

    <script src="./script/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="./script/jquery.js"></script>
    <script src="./script/script.js"></script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        $(document).ready(function () {

            let amount = 0;
            let val = "";
            const registrationPrices = {
                research_scholar: 500,
                foreign_delegates: 1500,
                academician: 700,
                industrialist: 700,
                ug_pg_students: 500
            };

            $("#participantType").change(function () {
                console.log("amount")
                val = $("#participantType").val();
                amount = registrationPrices[val];
                amount *= 100;
                // options.amount = amount;
            })


            // e.preventDefault();

            $("#pay_now").click(function () {
                if (validateForm()) {
                    // console.log("amt",amount)
                    const options = {
                        "key": <?php
                        echo $API_KEY;
                        ?>, // Enter the Key ID generated from the Dashboard
                        "amount": amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "name": "Conference",
                        "description": "Payment of Participant",
                        "image": "https://example.com/your_logo",
                        "handler": function (response) {
                            console.log(response)
                            var paymentId = response.razorpay_payment_id;

                            $('#participantForm').append('<input type="hidden" name="paymentId" value="' + paymentId + '">');
                            $('#participantForm').submit();

                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    const rzp1 = new Razorpay(options);

                    console.log(options)
                    rzp1.open();
                }
            });




            function validateForm() {
                // Add your custom validation logic here
                var isValid = true;

                // Example: Validate email
                var email = $('#email').val();
                if (email.trim() === '') {
                    alert('Email is required.');
                    isValid = false;
                }

                // Example: Validate participantType
                var participantType = $('#participantType').val();
                if (participantType === '') {
                    alert('Please select a participant type.');
                    isValid = false;
                }

                // Example: Validate phone number
                var phoneNumber = $('#phno').val();
                if (!/^\d{10}$/.test(phoneNumber)) {
                    alert('Phone number must be exactly 10 digits.');
                    isValid = false;
                }

                // Example: Validate name (only alphabets and spaces)
                var name = $('#name').val();
                if (!/^[A-Za-z\s]+$/.test(name)) {
                    alert('Name should contain only alphabets and spaces.');
                    isValid = false;
                }

                // Add more validations as needed

                return isValid;
            }





        });
    </script>
</body>

</html>