<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <?php
    include("./partials/navbar.php");
    ?>

    <main class="shadow-lg p-3  bg-white rounded">

<!--      
        <div class="container my-5">
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <h2 class="text-center mb-4">Conference Committees</h2>
                <div class="committee row " id="committee-container">
                </div>
            </div>
        </div>



        <div class="container my-5">
            <div class="shadow-lg md:p-3 mb-5 bg-white rounded">

                <h2 class="text-center mb-4">Invited Speakers</h2>
                <div class="speaker-grid " id="speakers-container">

                </div>
            </div>
        </div> -->



        <div class="container my-5">
            <div class="shadow-lg md:p-3 mb-5 bg-white rounded">
                <div class="form-container">
                    <form action="#" method="POST" enctype="multipart/form-data" class="registration-form" id="registrationForm">
    <h2 class="form-title">Conference Registration Form</h2>

    <div class="form-group">
        <label for="attendentType">Select Attendent Type</label>
        <select name="attendentType" id="attendentType" class="form-control select validate">
            <option value="">-- Select Attendent Type --</option>
            <option value="participant">Participating</option>
            <option value="presenter">Poster/Paper Presenter</option>
        </select>
        <span class="error-message"></span>
    </div>

    <div class="common-fields">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control input validate">
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control input validate">
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control input validate">
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" class="form-control input validate">
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Institute Name</label>
            <input type="text" name="institute" class="form-control input validate">
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control textarea validate"></textarea>
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control select validate">
                <option value="">-- Select Gender --</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Designation</label>
            <input type="text" name="designation" class="form-control input">
        </div>
    </div>

    <!-- Presenter Specific Fields -->
    <div class="presenter-fields" style="display: none;">
        <div class="form-group">
            <label for="track">Select Track</label>
            <input type="text" name="track" class="form-control input presenter-validate">
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Paper Title (Research Study On)</label>
            <input type="text" name="paper_title" class="form-control input presenter-validate">
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Upload Abstract (PDF only)</label>
            <input type="file" name="abstract_pdf" class="form-control file presenter-validate" accept="application/pdf">
            <span class="error-message"></span>
        </div>
        <div class="form-group">
            <label>Registering As</label>
            <select name="second_presenter_type" class="form-control select presenter-validate">
                <option value="">-- Select Participant Type --</option>
                <option value="research_scholar">Research Scholar</option>
                <option value="foreign_delegates">Foreign Delegates</option>
                <option value="academician">Academician</option>
                <option value="industrialist">Industrialist</option>
                <option value="ug_pg_students">UG/PG Students</option>
            </select>
            <span class="error-message"></span>
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn pay-btn">Proceed to Payment</button>
    </div>
</form>

                </div>
            </div>
        </div>


    </main>


    <script src="./script/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


    <script src="./script/jquery.js"></script>
    <script src="./script/script.js"></script>

    
    <script src="./script/registrationFormScript.js"></script>
    <script src="./script/payment.js"></script>
    
</body>

</html>