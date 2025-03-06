<?php
session_start();

// Agar CAPTCHA pehle se set nahi hai, tabhi generate karein
if (!isset($_SESSION['captcha'])) {
    $_SESSION['captcha'] = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 0, 6);
}
?>

