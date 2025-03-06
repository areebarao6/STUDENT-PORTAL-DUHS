<?php
session_start();

// Har refresh par naya CAPTCHA generate hoga
$_SESSION['captcha'] = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 0, 6);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="CSS/bootstrap.css">
   <!-- Custom CSS with Cache Bypass -->
   <link rel="stylesheet" href="CSS/style.css?v=<?php echo time(); ?>">
   <title>Document</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-lg-6 img-col d-lg-flex d-none -bg-fixed vh-100">
                <div class="content d-flex flex-column justify-content-between padding-all index w-100 h-100">
                    <div class="round-logo">
                        <img src="CSS/D.U.H.S_Logo.png" alt="LOGO" class="loginlogo img-fluid"/>
                    </div>
                    <div class="portal-box">
                        <h1 class="text-white">
                            STUDENT 
                            <span> FEEDBACK PORTAL</span> <br>
                            SCHOOL OF POSTGRADUATE STUDIES, DUHS 
                        </h1>
                    </div>
                    <div class="d-flex justify-content-between end">
                        <span class="text-white">© 2025 DOW UNIVERSITY OF HEALTH SCIENCES, DUHS</span>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#" class="text-white text-decoration-none text-link">Legal</a></li>
                            <li class="list-inline-item"><a href="#" class="text-white text-decoration-none text-link">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 bg-color">
                <div class="container vh-100">
                    <div class="row form-row vh-100 align-items-center">
                        <div class="col-md-8 col-lg-9 col-xl-8 mx-auto form-sign">
                            <div class="responsivelogo visible992">
                                <img src="CSS/logo-1.png">
                            </div>
                            <h2 style="color: #2a2a2a;" class="h2">SIGN IN</h2>
                            <p class="form-text">Please fill the details to access your account.</p>
                            <form action="login.php" method="POST">
                                <div class="mb-4">
                                    <label>* CNIC No.</label>   
                                    <div class="cnic-icon">   
                                        <span class="cnic-span">
                                            <i class="fa-regular fa-id-card input-icon"></i>
                                        </span>
                                        <input type="text" name="cnic" class="form-control pad-left" placeholder="XXXXX-XXXXXXX-X" required title="Enter 15 Digit CNIC Number with Dashes">
                                    </div>
                                    <small class="form-text">Please Enter 15 Digit CNIC No. with Dashes</small>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex flex-row justify-content-between">
                                        <label>* Password</label> <a href="#" style="color: #0E5696;">Forgot Password?</a>
                                    </div>
                                    <div class="pwd-icon"> 
                                        <span class="pwd-span">
                                            <i class="fa-solid fa-key input-icon"></i>
                                        </span>
                                        <input type="password" id="password" name="password" class="form-control pad-left" placeholder="Enter Password" required title="Please Enter Password">
                                        <span class="eye-icon" onclick="togglePassword()">
                                            <i class="fa-regular fa-eye input-icon2" id="toggleEye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mb-5">
                                    <label id="captcha_label" style="font-weight: bold; color: blue;">
                                        <?php echo $_SESSION['captcha']; ?> 
                                    </label>
                                    <input type="text" id="captcha_input" class="form-control" name="captcha" placeholder="Enter String" required title="Enter String">
                                    <small class="form-text">Please type the string as appeared in the image</small>
                                </div> 

                                <div class="d-grid gap-2">
                                    <button class="btn" type="submit" style="background-color: #0E5696; color:white;" >Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleEye = document.getElementById("toggleEye");
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleEye.classList.remove("fa-eye");
                toggleEye.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleEye.classList.remove("fa-eye-slash");
                toggleEye.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
