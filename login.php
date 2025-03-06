<?php
session_start();
include 'config.php'; // Database Connection File

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cnic = $_POST['cnic'];
    $password = $_POST['password'];
    $user_captcha = $_POST['captcha']; // User ka entered captcha

    // ✅ Debugging: Check stored & entered CAPTCHA
    echo "Stored CAPTCHA: " . $_SESSION['captcha'] . "<br>";
    echo "User Entered CAPTCHA: " . $user_captcha . "<br>";

    // ✅ **Step 1: CAPTCHA Validation**
    if ($user_captcha !== $_SESSION['captcha']) {
        echo "<script>alert('Invalid CAPTCHA!'); window.location.href='index.php';</script>";
        exit();
    }

    // ✅ **Step 2: CNIC & Password Database Check**
    $query = "SELECT * FROM users WHERE cnic = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $cnic);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // **Fetch Row (IMPORTANT STEP)**
    $row = mysqli_fetch_assoc($result);
    
    if ($row) { // User exists
        if ($password === $row['password']) { // Plaintext password comparison
            $_SESSION['cnic'] = $cnic;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid Password!'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid CNIC!'); window.location.href='index.php';</script>";
    }
}
?>
