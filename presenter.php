<?php

session_start();
require("./partials/config.php");

try {
    //code...

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function uploadFile($file, $targetPath)
        {

            if (move_uploaded_file($file["tmp_name"], $targetPath)) {
                return true;
            } else {
                return false;
            }
        }



        $query = "select reg_id from tbl_attendents order by reg_id desc limit 1";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // Fetch the associative array of the first row
            $row = $result->fetch_assoc();

            // Extract the numeric part from the 'regId' field
            $regId = $row['reg_id'];
            $numericPart = (int) substr($regId, 3);
            $numericPart += 1;

            // echo $numericPart;
        } else {
            $numericPart = 1;
        }
        $reg_id = "atd" . $numericPart;



        $hasSecondAuthor = isset($_POST["hasSecondAuthor"]);
        $hasThirdAuthor = isset($_POST["hasThirdAuthor"]);

        $track = $_POST["track"];
        $paperTitle = $_POST["paperTitle"];

        // Upload Abstract and Paper files
        $abstractFile = $_FILES["abstract"];
        $paperFile = $_FILES["paper"];

        $abstract_file_url = $reg_id . "_abstract_" . $abstractFile["name"];
        $paper_file_url = $reg_id . "_paper_" . $paperFile["name"];

        $targetpath_for_abstract = "./uploads/docs/" . $abstract_file_url;
        $targetpath_for_paper = "./uploads/docs/" . $paper_file_url;

        // Handle First Author details
        $firstEmail = $_POST["first_email"];
        $firstSalutation = $_POST["first_salutation"];
        $firstName = $_POST["first_name"];
        $firstInstituteName = $_POST["first_institute_name"];
        $firstDesignation = $_POST["first_designation"];
        $first_author_gender = $_POST["first_gender"];
        $first_author_mobile = $_POST["first_phno"];
        $first_presenter_type = $_POST["first_presenter_type"];
        $first_author_address = addslashes($_POST["first_author_address"]);
        // Upload First Author photo
        // $firstPhoto = $_FILES["first_photo"];
        $first_photo_url = "./uploads/photos/". $reg_id . "_" . $_FILES["first_photo"]["name"];


        if ($hasSecondAuthor) {
            $secondEmail = $_POST["second_email"];
            $secondSalutation = $_POST["second_salutation"];
            $secondName = $_POST["second_name"];
            $secondInstituteName = $_POST["second_institute_name"];
            $secondDesignation = $_POST["second_designation"];
            $second_author_gender = $_POST["second_gender"];
            $second_author_mobile = $_POST["second_phno"];
            $second_presenter_type = $_POST["second_presenter_type"];
            $second_author_address = addslashes($_POST["second_author_address"]);
            // Upload Second Author photo
            $second_photo_url ="./uploads/photos/". $reg_id . "_" . $_FILES["second_photo"]["name"];
        }

        if ($hasThirdAuthor) {
            $thirdEmail = $_POST["third_email"];
            $thirdSalutation = $_POST["third_salutation"];
            $thirdName = $_POST["third_name"];
            $thirdInstituteName = $_POST["third_institute_name"];
            $thirdDesignation = $_POST["third_designation"];
            $third_author_gender = $_POST["third_gender"];
            $third_author_mobile = $_POST["third_phno"];
            $third_presenter_type = $_POST["third_presenter_type"];
            $third_author_address = addslashes($_POST["third_author_address"]);
            // Upload Third Author photo
            $third_photo_url ="./uploads/photos/". $reg_id . "_" . $_FILES["third_photo"]["name"];
        }

        $payment_id = $_POST["paymentId"];

        //uploading files then proceeding forward

        if (
            uploadFile($abstractFile, $targetpath_for_abstract)
            &&
            uploadFile($paperFile, $targetpath_for_paper)
            &&
            uploadFile($_FILES["first_photo"], $first_photo_url)
        ) {
            if ($hasSecondAuthor) {
                if (uploadFile($_FILES["second_photo"], $second_photo_url)) {
                    if ($hasThirdAuthor) {
                        if (uploadFile($_FILES["third_photo"], $third_photo_url)) {
                            // execute query 

                            $query = "insert into tbl_attendents values('$reg_id','Presenter','$track','$paperTitle','$abstract_file_url','$paper_file_url','$firstEmail', '$firstSalutation', '$firstName','$firstInstituteName' ,'$first_presenter_type', '$firstDesignation', '$first_author_gender', '$first_author_mobile', '$first_author_address', '$first_photo_url','$secondEmail', '$secondSalutation', '$secondName','$secondInstituteName' ,'$second_presenter_type', '$secondDesignation', '$second_author_gender', '$second_author_mobile', '$second_author_address', '$second_photo_url','$thirdEmail', '$thirdSalutation', '$thirdName','$thirdInstituteName' ,'$third_presenter_type', '$thirdDesignation', '$third_author_gender', '$third_author_mobile', '$third_author_address', '$third_photo_url','$payment_id')";

                            if ($conn->query($query)) {
                                ?>
                                <script>
                                    alert("Presenter Team Registered Successfully");
                                </script>
                                <?php
                            } else {
                                echo "Error: " . $conn->error;
                            }


                        } else {
                            // uploading error
                            ?>
                            <script>
                                alert("Error While Uploading Photo of 3rd Author");
                            </script>
                            <?php
                        }
                    } {
                        // execute Query
                        $query = "insert into tbl_attendents values('$reg_id','Presenter','$track','$paperTitle','$abstract_file_url','$paper_file_url','$firstEmail', '$firstSalutation', '$firstName','$firstInstituteName' ,'$first_presenter_type', '$firstDesignation', '$first_author_gender', '$first_author_mobile', '$first_author_address', '$first_photo_url','$secondEmail', '$secondSalutation', '$secondName','$secondInstituteName' ,'$second_presenter_type', '$secondDesignation', '$second_author_gender', '$second_author_mobile', '$second_author_address', '$second_photo_url',NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,'$payment_id')";

                        if ($conn->query($query)) {
                            ?>
                            <script>
                                alert("Presenter Team Registered Successfully");
                            </script>
                            <?php
                        } else {
                            echo "Error: " . $conn->error;
                        }


                    }
                } else {
                    // uploading error
                    ?>
                    <script>
                        alert("Error While Uploading Photo of 2nd Author");
                    </script>
                    <?php
                }
            } else {
                // execute Query
                $query = "insert into tbl_attendents values('$reg_id','Presenter','$track','$paperTitle','$abstract_file_url','$paper_file_url','$firstEmail', '$firstSalutation', '$firstName','$firstInstituteName' ,'$first_presenter_type', '$firstDesignation', '$first_author_gender', '$first_author_mobile', '$first_author_address', '$first_photo_url',NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,'$payment_id')";

                if ($conn->query($query)) {
                    ?>
                    <script>
                        alert("Presenter Team Registered Successfully");
                    </script>
                    <?php
                } else {
                    echo "Error: " . $conn->error;
                }


            }
        } else {
            // uploading error
            ?>
            <script>
                alert("Error While Uploading Photo of 1st Author or Paper or Abstract");
            </script>
            <?php
        }





    }

} catch (\Throwable $th) {
    //throw $th;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presenter Registration</title>
    <link rel="stylesheet" href="./style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <?php
    include("./partials/navbar.php");
    ?>

    <main class="container my-2 p-3 w-100">
        <section class="mt-4 p-5 bg-primary text-white rounded">

            <form action="#" method="post" id="presenterForm" enctype="multipart/form-data" class="p-3 border">
                <fieldset>
                    <legend>Paper Details</legend>

                    <section class="px-3 my-3">
                        <label for="pt">Your track :</label>
                        <select id="track" name="track" class="p-2 my-3 w-100" required>
                            <option value="">-- Select Your Track --</option>
                            <option value="Science and Technology">Science and Technology</option>
                            <option value="Management and Commerce">Management and Commerce</option>
                            <option value="International Relations/Affairs/Trade">International Relations/Affairs/Trade
                            </option>
                            <option value="Social Science and Humanities">Social Science and Humanities</option>
                            <option value="Economy, Business and Law">Economy, Business and Law</option>
                            <option value="Sustainable Development">Sustainable Development</option>
                            <option value="Medical, Ayurveda & homeopathy">Medical, Ayurveda & homeopathy</option>
                            <option value="Language & Literature">Language & Literature</option>
                            <option value="Physical education and Yoga">Physical education and Yoga</option>
                            <option value="Allied area of Science, Commerce and Arts">Allied area of Science, Commerce
                                and
                                Arts</option>
                        </select>
                    </section>

                    <section class="px-3 my-3 w-100">

                        <label for="name">Your research Study on ( paper title) </label>
                        <input type="text" name="paperTitle" id="paperTitle" class="form-control"
                            placeholder="Enter Paper Title" required>
                    </section>

                    <section class="form-group px-3 my-3 w-100">
                        <label for="file"> Upload Abstract (Maximum 300 Words) Word File </label>
                        <input type="file" class="form-control-file" id="abstract" name="abstract" accept=".docx"
                            required>
                    </section>

                    <section class="form-group px-3 my-3 w-100">
                        <label for="file"> Upload paper (maximum 5000 Words) Word File </label>
                        <input type="file" class="form-control-file" id="paper" name="paper" accept=".docx" required>
                    </section>

                </fieldset>

                <fieldset>
                    <legend>Details of First Author </legend>
                    <section class="px-3 my-3">
                        <label for="email">Email:</label>
                        <input type="email" name="first_email" id="first_email" class="form-control"
                            placeholder="Enter Email" required>
                    </section>

                    <section class="px-3 my-3">
                        <label for="salutation">Your Salutation:</label>
                        <select name="first_salutation" id="first_salutation" class="p-1 form-control" required>
                            <option value="">-- Select Your Salutation --</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Prof.">Prof.</option>
                            <option value="Prin.">Prin.</option>
                            <option value="Prof.Dr.">Prof.Dr.</option>
                            <option value="I/c. Prin.">I/c. Prin.</option>
                            <option value="Prin. Dr.">Prin. Dr.</option>
                            <option value="I/c. Prin. Dr.">I/c. Prin. Dr.</option>
                        </select>
                    </section>
                    <section class="px-3 my-3">

                        <label for="name">Full Name: (for Certificate purpose) </label>
                        <input type="text" name="first_name" id="first_name" class="form-control"
                            placeholder="Enter Full Name" required>
                    </section>

                    <section class="px-3 my-3">

                        <label for="institute_name">Esteemed Institute Name: (for Certificate purpose) </label>
                        <input type="text" name="first_institute_name" id="first_institute_name" class="form-control"
                            placeholder="Enter Institute Name" required>
                    </section>

                    <section class="px-3 my-3">

                        <label for="Designation">Designation: (for Certificate purpose) </label>
                        <input type="text" name="first_designation" id="first_designation" class="form-control"
                            placeholder="Enter Designation" required>
                    </section>
                    <section class="px-3 my-3">
                        <label for="address">We can meet (Address)</label>
                        <textarea name="first_author_address" id="first_author_address" cols="30" rows="10"
                            class="form-control" required></textarea>
                    </section>
                    <section class="px-3 my-3">
                        <label for="gender"> Gender :</label>
                        <section class="form-group">
                            <label for="maleRadio">Male</label>
                            <input type="radio" class="form-check-input" id="first_male_radio" name="first_gender"
                                value="male" required>

                            <label for="femaleRadio">Female</label>
                            <input type="radio" class="form-check-input" id="fisrt_female_radio" name="first_gender"
                                value="female" required>

                            <label for="transgenderRadio">Transgender</label>
                            <input type="radio" class="form-check-input" id="fisrt_transgender_radio"
                                name="first_gender" value="transgender" required>
                        </section>
                    </section>
                    <section class="px-3 my-3">
                        <label for="phno">Phone Number:</label>
                        <input type="tel" name="first_phno" id="first_phno" placeholder="Enter Phone Number"
                            class="form-control" required>
                    </section>
                    <section class="px-3 my-3 custom-file">
                        <label class="custom-file-label" for="photo">Upload Passport Photograph ( for
                            certificate):</label>
                        <input type="file" class="custom-file-input" name="first_photo" id="first_photo"
                            accept="image/*" required>
                    </section>
                    <section class="px-3 my-3">
                        <label for="pt">You Want to Register As:</label>
                        <select name="first_presenter_type" id="first_presenter_type" class="p-1 form-control" required>
                            <option value="">-- Select Participant Type --</option>
                            <option value="research_scholar">Research Scholar</option>
                            <option value="foreign_delegates">Foreign Delegates</option>
                            <option value="academician">Academician</option>
                            <option value="industrialist">Industrialist</option>
                            <option value="ug_pg_students">UG/PG Students</option>
                        </select>
                    </section>
                </fieldset>



                <fieldset>
                    <legend>Details of Second Author </legend>
                    <section class="px-3 my-3">
                        <label for="hasSecondAuthor">Do you have a second author?</label>
                        <input type="checkbox" id="hasSecondAuthor" name="hasSecondAuthor">
                    </section>
                    <section class="px-3 my-3">
                        <label for="email">Email:</label>
                        <input type="email" name="second_email" id="second_email" class="form-control second"
                            placeholder="Enter Email">
                    </section>

                    <section class="px-3 my-3">
                        <label for="salutation">Your Salutation:</label>
                        <select name="second_salutation" id="second_salutation" class="p-1 form-control second">
                            <option value="">-- Select Your Salutation --</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Prof.">Prof.</option>
                            <option value="Prin.">Prin.</option>
                            <option value="Prof.Dr.">Prof.Dr.</option>
                            <option value="I/c. Prin.">I/c. Prin.</option>
                            <option value="Prin. Dr.">Prin. Dr.</option>
                            <option value="I/c. Prin. Dr.">I/c. Prin. Dr.</option>
                        </select>
                    </section>
                    <section class="px-3 my-3">
                        <label for="name">Full Name: (for Certificate purpose) </label>
                        <input type="text" name="second_name" id="second_name" class="form-control second"
                            placeholder="Enter Full Name">
                    </section>

                    <section class="px-3 my-3">
                        <label for="institute_name">Esteemed Institute Name: (for Certificate purpose) </label>
                        <input type="text" name="second_institute_name" id="second_institute_name" class="form-control second"
                            placeholder="Enter Institute Name">
                    </section>

                    <section class="px-3 my-3">
                        <label for="Designation">Designation: (for Certificate purpose) </label>
                        <input type="text" name="second_designation" id="second_designation" class="form-control second"
                            placeholder="Enter Designation">
                    </section>
                    <section class="px-3 my-3">
                        <label for="address">We can meet (Address)</label>
                        <textarea name="second_author_address" id="second_author_address" cols="30" rows="10"
                            class="form-control second" required></textarea>
                    </section>
                    <section class="px-3 my-3">
                        <label for="gender"> Gender :</label>
                        <section class="form-group">
                            <label for="maleRadio">Male</label>
                            <input type="radio" class="form-check-input second" id="second_male_radio" name="second_gender"
                                value="male">

                            <label for="femaleRadio">Female</label>
                            <input type="radio" class="form-check-input second" id="second_female_radio" name="second_gender"
                                value="female">

                            <label for="transgenderRadio">Transgender</label>
                            <input type="radio" class="form-check-input second" id="second_transgender_radio"
                                name="second_gender" value="transgender">
                        </section>
                    </section>
                    <section class="px-3 my-3">
                        <label for="phno">Phone Number:</label>
                        <input type="tel" name="second_phno" id="second_phno" placeholder="Enter Phone Number"
                            class="form-control second">
                    </section>
                    <section class="px-3 my-3 custom-file">
                        <label class="custom-file-label" for="photo">Upload Passport Photograph ( for
                            certificate):</label>
                        <input type="file" class="custom-file-input second" name="second_photo" id="second_photo"
                            accept="image/*">
                    </section>
                    <section class="px-3 my-3">
                        <label for="pt">You Want to Register As:</label>
                        <select name="second_presenter_type" id="second_presenter_type" class="p-1 form-control second">
                            <option value="">-- Select Participant Type --</option>
                            <option value="research_scholar">Research Scholar</option>
                            <option value="foreign_delegates">Foreign Delegates</option>
                            <option value="academician">Academician</option>
                            <option value="industrialist">Industrialist</option>
                            <option value="ug_pg_students">UG/PG Students</option>
                        </select>
                    </section>
                </fieldset>



                <fieldset>
                    <legend>Details of Third Author </legend>
                    <section class="px-3 my-3">
                        <label for="hasThirdAuthor">Do you have a third author?</label>
                        <input type="checkbox" id="hasThirdAuthor" name="hasThirdAuthor">
                    </section>
                    <section class="px-3 my-3">
                        <label for="email">Email:</label>
                        <input type="email" name="third_email" id="third_email" class="form-control"
                            placeholder="Enter Email">
                    </section>

                    <section class="px-3 my-3">
                        <label for="salutation">Your Salutation:</label>
                        <select name="third_salutation" id="third_salutation" class="p-1 form-control">
                            <option value="">-- Select Your Salutation --</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Prof.">Prof.</option>
                            <option value="Prin.">Prin.</option>
                            <option value="Prof.Dr.">Prof.Dr.</option>
                            <option value="I/c. Prin.">I/c. Prin.</option>
                            <option value="Prin. Dr.">Prin. Dr.</option>
                            <option value="I/c. Prin. Dr.">I/c. Prin. Dr.</option>
                        </select>
                    </section>
                    <section class="px-3 my-3">
                        <label for="name">Full Name: (for Certificate purpose) </label>
                        <input type="text" name="third_name" id="third_name" class="form-control"
                            placeholder="Enter Full Name">
                    </section>

                    <section class="px-3 my-3">
                        <label for="institute_name">Esteemed Institute Name: (for Certificate purpose) </label>
                        <input type="text" name="third_institute_name" id="third_institute_name" class="form-control"
                            placeholder="Enter Institute Name">
                    </section>

                    <section class="px-3 my-3">
                        <label for="Designation">Designation: (for Certificate purpose) </label>
                        <input type="text" name="third_designation" id="third_designation" class="form-control"
                            placeholder="Enter Designation">
                    </section>
                    <section class="px-3 my-3">
                        <label for="address">We can meet (Address)</label>
                        <textarea name="third_author_address" id="third_author_address" cols="30" rows="10"
                            class="form-control" required></textarea>
                    </section>
                    <section class="px-3 my-3">
                        <label for="gender"> Gender :</label>
                        <section class="form-group">
                            <label for="maleRadio">Male</label>
                            <input type="radio" class="form-check-input" id="third_male_radio" name="third_gender"
                                value="male">

                            <label for="femaleRadio">Female</label>
                            <input type="radio" class="form-check-input" id="third_female_radio" name="third_gender"
                                value="female">

                            <label for="transgenderRadio">Transgender</label>
                            <input type="radio" class="form-check-input" id="third_transgender_radio"
                                name="third_gender" value="transgender">
                        </section>
                    </section>
                    <section class="px-3 my-3">
                        <label for="phno">Phone Number:</label>
                        <input type="tel" name="third_phno" id="third_phno" placeholder="Enter Phone Number"
                            class="form-control">
                    </section>
                    <section class="px-3 my-3 custom-file">
                        <label class="custom-file-label" for="photo">Upload Passport Photograph ( for
                            certificate):</label>
                        <input type="file" class="custom-file-input" name="third_photo" id="third_photo"
                            accept="image/*">
                    </section>
                    <section class="px-3 my-3">
                        <label for="pt">You Want to Register As:</label>
                        <select name="third_presenter_type" id="third_presenter_type" class="p-1 form-control">
                            <option value="">-- Select Participant Type --</option>
                            <option value="research_scholar">Research Scholar</option>
                            <option value="foreign_delegates">Foreign Delegates</option>
                            <option value="academician">Academician</option>
                            <option value="industrialist">Industrialist</option>
                            <option value="ug_pg_students">UG/PG Students</option>
                        </select>
                    </section>
                </fieldset>
                <fieldset>
                    <legend>Agreement and Confirmation</legend>
                    <section class="px-3 my-3">
                        <label for="confrimation">The above information is true and best of my knowledge and gives my
                            concern for the certificate.</label>
                        <br>
                        <input type="radio" name="confirmation" id="confirmation" class="mx-3" required>
                        <span>Yes, I agree </span>
                    </section>
                    <section class="px-3 my-3">
                        <label for="copyright_confirmation">I agree to the Copyright Agreement:</label>
                        <br>
                        <input type="radio" name="copyright_confirmation" id="copyright_confirmation" class="mx-3"
                            required>
                        <span>Yes, I agree</span>
                    </section>

                </fieldset>

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
        let amount = 0;
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        $(document).ready(function () {

            let amount = 0;
            let val = "";        


            function clearAndDisableSecondFields() {
            $('.second').each(function () {
                if ($(this).is('input[type="checkbox"], input[type="radio"]')) {
                    // For checkboxes and radio buttons, uncheck and disable
                    $(this).prop('checked', false).prop('disabled', true);
                } else {
                    // For other input, select, and textarea fields, clear value and disable
                    $(this).val('').prop('disabled', true);
                }
            });
        }

        // Initially call the function to clear and disable fields if needed
        clearAndDisableSecondFields();


        $('#hasSecondAuthor').change(function () {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // If checked, enable the fields
                $('.second').prop('disabled', false);
            } else {
                // If not checked, clear values and disable the fields
                clearAndDisableSecondFields();
            }
        });


        function clearAndDisableThirdFields() {
            $('.third').each(function () {
                if ($(this).is('input[type="checkbox"], input[type="radio"]')) {
                    // For checkboxes and radio buttons, uncheck and disable
                    $(this).prop('checked', false).prop('disabled', true);
                } else {
                    // For other input, select, and textarea fields, clear value and disable
                    $(this).val('').prop('disabled', true);
                }
            });
        }

        // Initially call the function to clear and disable fields if needed
        clearAndDisableThirdFields();

        $('#hasThirdAuthor').change(function () {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // If checked, enable the fields
                $('.third').prop('disabled', false);
            } else {
                // If not checked, clear values and disable the fields
                clearAndDisableThirdFields();
            }
        });

            let isThereSecondAuthor = $("#hasSecondAuthor").is(':checked');
            let isThereThirdAuthor = $("#hasThirdAuthor").is(':checked');



            console.log("check",isThereSecondAuthor)
            $("#hasSecondAuthor").change(function () {
                isThereSecondAuthor = $("#hasSecondAuthor").is(':checked');
                console.log(isThereSecondAuthor);
            })
            $("#hasThirdAuthor").change(function name() {
                isThereThirdAuthor = $("#hasThirdAuthor").is(':checked');
                console.log(isThereThirdAuthor)
            })


            const registrationPrices = {
                research_scholar: 500,
                foreign_delegates: 1500,
                academician: 700,
                industrialist: 700,
                ug_pg_students: 500,
                "": 0
            };

            function changeAmt() {
                amount = registrationPrices[$("#first_presenter_type").val()];
                if (isThereSecondAuthor) {
                    amount += registrationPrices[$("#second_presenter_type").val()];
                }
                if (isThereThirdAuthor) {
                    amount += registrationPrices[$("#third_presenter_type").val()];
                }

                amount *= 100;
            }


            $("#first_presenter_type").change(changeAmt)
            $("#second_presenter_type").change(changeAmt)
            $("#third_presenter_type").change(changeAmt)



            $("#pay_now").click(function () {
                if (validateForm()) {
                    // console.log("amt",amount)
                    const options = {
                        "key": "rzp_test_SpVAPuZp9HlFTG", // Enter the Key ID generated from the Dashboard
                        "amount": amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "name": "Conference",
                        "description": "Payment of Participant",
                        "image": "https://example.com/your_logo",
                        "handler": function (response) {
                            console.log(response)
                            var paymentId = response.razorpay_payment_id;

                            $('#presenterForm').append('<input type="hidden" name="paymentId" value="' + paymentId + '">');
                            $('#presenterForm').submit();

                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    const rzp1 = new Razorpay(options);

                    // console.log(options)
                    rzp1.open();
                }
            });




            function validateForm() {
                // Add your custom validation logic here
                var isValid = true;



                // Example: Validate email
                var email = $('#first_email').val();
                if (email.trim() === '') {
                    alert('First Author Email is required.');
                    isValid = false;
                }

                if (isThereSecondAuthor) {
                    email = $('#second_email').val();
                    if (email.trim() === '') {
                        alert('second Author Email is required.');
                        isValid = false;
                    }
                }

                if (isThereThirdAuthor) {
                    email = $('#third_email').val();
                    if (email.trim() === '') {
                        alert('third Author Email is required.');
                        isValid = false;
                    }
                }




                // // Example: Validate participantType
                // var participantType = $('#participantType').val();
                // if (participantType === '') {
                //     alert('Please select a participant type.');
                //     isValid = false;
                // }

                // Example: Validate phone number
                var phoneNumber = $('#first_phno').val();
                if (!/^\d{10}$/.test(phoneNumber)) {
                    alert('Phone number must be exactly 10 digits. Check First Phone Number');
                    isValid = false;
                }

                if (isThereSecondAuthor) {
                    phoneNumber = $('#second_phno').val();
                    if (!/^\d{10}$/.test(phoneNumber)) {
                        alert('Phone number must be exactly 10 digits. Check Second Phone Number');
                        isValid = false;
                    }
                }

                if (isThereThirdAuthor) {
                    phoneNumber = $('#third_phno').val();
                    if (!/^\d{10}$/.test(phoneNumber)) {
                        alert('Phone number must be exactly 10 digits. Check Third Phone Number');
                        isValid = false;
                    }

                }



                // Example: Validate name (only alphabets and spaces)
                var name = $('#first_name').val();
                if (!/^[A-Za-z\s]+$/.test(name)) {
                    alert('Name should contain only alphabets and spaces. Check Name of First Author');
                    isValid = false;
                }

                if (isThereSecondAuthor) {

                    name = $('#second_name').val();

                    if (!/^[A-Za-z\s]+$/.test(name)) {
                        alert('Name should contain only alphabets and spaces. Check Name of Second Author');
                        isValid = false;
                    }
                }

                if (isThereThirdAuthor) {

                    name = $('#third_name').val();
                    if (!/^[A-Za-z\s]+$/.test(name)) {
                        alert('Name should contain only alphabets and spaces. Check Name of First Author');
                        isValid = false;
                    }
                }
                // Add more validations as needed

                return isValid;
            }





        });


    </script>

</body>

</html>