<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli("localhost", "root", "", "conference");
    $conn->set_charset("utf8mb4"); // Secure charset
} catch (mysqli_sql_exception $e) {
    error_log("Database connection error: " . $e->getMessage()); // Don't show to user
    http_response_code(500);
    die("Internal Server Error");
}
?>
