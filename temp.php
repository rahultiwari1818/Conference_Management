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


        <section class="conference-heading-section text-center my-4 px-3">
            <h1 class="conference-title mb-2">
                5<sup>th</sup> International Conference on Mathematical Techniques and Applications (ICMTA-2024)
            </h1>
            <h2 class="conference-subtitle mb-2">
                &amp; Workshop on Scientific Computing, Modeling and Deep Learning (WSCMDL)
            </h2>
            <p class="conference-association mb-0">
                In association with<br>
                <strong>Indian Society for Mathematical Modeling and Computer Simulation (ISMMACS)</strong>
            </p>
        </section>

        <div class="container my-5" id="about-workshop-section">
            <div class="shadow-lg md:p-3 mb-5 bg-white rounded">

            </div>
        </div>


        <div class="container my-5" id="important-dates-section">
            <div class="shadow-lg md:p-3 mb-5 bg-white rounded">

            </div>
        </div>




        <div class="container my-5" id="registration-section">
            <div class="shadow-lg md:p-3 mb-5 bg-white rounded">
                <div class="container py-5 px-5">

                    <div class="section">
                        <div class="title">Registration Fee (Including 18% GST)</div>

                        <button class="toggle-btn" data-target="#workshopTable">Show Workshop Fees</button>
                        <div id="workshopTable" class="table-wrapper hidden"></div>

                        <button class="toggle-btn" data-target="#conferenceTable">Show Conference Fees</button>
                        <div id="conferenceTable" class="table-wrapper hidden"></div>

                        <button class="toggle-btn" data-target="#workshopConfTable">Show Workshop +
                            Conference Fees</button>
                        <div id="workshopConfTable" class="table-wrapper hidden"></div>

                        <p class="sub-heading">DAU Faculty/Students: <span id="srmRate"></span></p>
                    </div>

                    <div class="section">
                        <div class="title">Notes</div>
                        <ul class="note-list" id="notesList"></ul>
                    </div>
                </div>
                <div class="form-container">
                    <form action="#" method="POST" enctype="multipart/form-data" class="registration-form"
                        id="registrationForm">
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
                                <input type="file" name="abstract_pdf" class="form-control file presenter-validate"
                                    accept="application/pdf">
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

        <div class="container my-5" id="workshop-schedule-section">
            <div class="shadow-lg p-4 mb-5 bg-white rounded">
                <h2 class="text-center mb-4">Workshop Schedule</h2>
                <div id="schedule-container" class="row gy-4"></div>
            </div>
        </div>


        <div class="container my-5" id="invited-speakers-section">
            <div class="shadow-lg md:p-3 py-3 mb-5 bg-white rounded">

                <h2 class="text-center mb-4">Invited Speakers</h2>
                <div class="speaker-grid " id="speakers-container">

                </div>
            </div>
        </div>


        <div class="container my-5" id="committee-section">
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <h2 class="text-center mb-4">Conference Committees</h2>
                <div class="committee row " id="committee-container">
                </div>
            </div>
        </div>



        <div class="container my-5" id="sponsors-section">
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <h2 class="text-center mb-4">Sponsors</h2>
                <div class="committee row " id="sponsors-container">
                </div>
            </div>
        </div>





    </main>
    <!-- Contact & Location Section -->
    <div class="container my-5" id="contact-location-section">
        <div class="contact-box">
            <!-- Google Map -->
            <div class="map-section">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10035.502237081195!2d72.634882146719!3d23.190890534346202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c2a3c9618d2c5%3A0xc54de484f986b1fa!2sDA-IICT!5e0!3m2!1sen!2sin!4v1749908298624!5m2!1sen!2sin"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Contact Details -->
            <div class="contact-details">
                <h3>Contact Information</h3>
                <p><strong>Address:</strong><br> Dhirubhai Ambani Institute of Information and Communication
                    Technology,<br> Gandhinagar, Gujarat - 382007</p>
                <p><strong>Email:</strong> <a href="mailto:icmta2024@daiict.ac.in">icmta2024@daiict.ac.in</a></p>
                <p><strong>Phone:</strong> +91-9876543210</p>
                <p><strong>Contact Person:</strong><br> Dr. A. B. Sharma (Conference Coordinator)</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="footer-container">
            <p>
                Developed and Managed by
                <a href="https://portfolio-rahul-tiwari.vercel.app" target="_blank">Rahul Tiwari</a>
            </p>
        </div>
    </footer>



    <script src="./script/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


    <script src="./script/jquery.js"></script>
    <script src="./script/script.js"></script>


    <script src="./script/registrationFormScript.js"></script>
    <script src="./script/payment.js"></script>

</body>

</html>