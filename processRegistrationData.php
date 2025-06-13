<?php

// Helper function
function sanitize($data, $conn) {
    return htmlspecialchars(mysqli_real_escape_string($conn, trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["attendentType"])) {
    $attendentType = sanitize($_POST["attendentType"], $conn);
    $firstName = sanitize($_POST["first_name"], $conn);
    $lastName = sanitize($_POST["last_name"], $conn);
    $email = sanitize($_POST["email"], $conn);
    $phone = sanitize($_POST["phone"], $conn);
    $institute = sanitize($_POST["institute"], $conn);
    $address = sanitize($_POST["address"], $conn);
    $gender = sanitize($_POST["gender"], $conn);
    $designation = sanitize($_POST["designation"], $conn);

    // Validation: Required Fields
    $errors = [];

    if (empty($firstName)) $errors[] = "First name is required.";
    if (empty($lastName)) $errors[] = "Last name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (empty($phone) || !preg_match('/^[0-9]{10}$/', $phone)) $errors[] = "Valid 10-digit phone is required.";
    if (empty($institute)) $errors[] = "Institute name is required.";
    if (empty($address)) $errors[] = "Address is required.";
    if (empty($gender)) $errors[] = "Gender is required.";

    // Additional fields for presenter
    if ($attendentType === "presenter") {
        $track = sanitize($_POST["track"], $conn);
        $paperTitle = sanitize($_POST["paper_title"], $conn);
        $participantType = sanitize($_POST["second_presenter_type"], $conn);

        if (empty($track)) $errors[] = "Track is required.";
        if (empty($paperTitle)) $errors[] = "Paper title is required.";
        if (empty($participantType)) $errors[] = "Participant type is required.";

        // File validation
        if (isset($_FILES["abstract_pdf"]) && $_FILES["abstract_pdf"]["error"] === 0) {
            $fileTmp = $_FILES["abstract_pdf"]["tmp_name"];
            $fileName = basename($_FILES["abstract_pdf"]["name"]);
            $fileType = mime_content_type($fileTmp);

            if ($fileType !== "application/pdf") {
                $errors[] = "Only PDF files are allowed.";
            }

            $uploadDir = "uploads/";
            $uploadPath = $uploadDir . $fileName;

        } else {
            $errors[] = "Abstract PDF is required.";
        }
    }

    // If no errors, proceed to insert
    if (empty($errors)) {
        // Handle file upload
        if ($attendentType === "presenter") {
            if (!move_uploaded_file($fileTmp, $uploadPath)) {
                die("File upload failed.");
            }
        }

        $stmt = $conn->prepare("INSERT INTO conference_registrations 
            (attendent_type, first_name, last_name, email, phone, institute, address, gender, designation, track, paper_title, participant_type, abstract_filename) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $track = $attendentType === "presenter" ? $track : null;
        $paperTitle = $attendentType === "presenter" ? $paperTitle : null;
        $participantType = $attendentType === "presenter" ? $participantType : null;
        $abstractFilename = $attendentType === "presenter" ? $fileName : null;

        $stmt->bind_param(
            "sssssssssssss",
            $attendentType,
            $firstName,
            $lastName,
            $email,
            $phone,
            $institute,
            $address,
            $gender,
            $designation,
            $track,
            $paperTitle,
            $participantType,
            $abstractFilename
        );

        if ($stmt->execute()) {
            echo "<p>✅ Registration Successful!</p>";
            if ($attendentType === "presenter") {
                echo "<p>Uploaded Abstract: <strong>" . htmlspecialchars($fileName) . "</strong></p>";
            }
        } else {
            echo "<p>❌ Registration failed: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
    }

    $conn->close();
}
?>
