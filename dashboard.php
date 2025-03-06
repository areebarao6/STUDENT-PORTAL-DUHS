<?php
session_start();
if (!isset($_SESSION['cnic'])) {
    header("Location: index.html");
    exit();
}
?>
<html>
<head><title>Dashboard</title></head>
<body>
    <h2>Welcome, <?php echo $_SESSION['cnic']; ?>!</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
