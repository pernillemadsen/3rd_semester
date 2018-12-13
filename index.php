<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.html");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                           header("location: index.html");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                            $_SESSION["loggedin"] = false;
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                    $_SESSION["loggedin"] = false;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                $_SESSION["loggedin"] = false;
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <title>Login - Dit Virtuelle Kæledyr</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet">
        <!--
		CSS
		============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main1.css">

        <style type="text/css">
            
            body {
                font-family: Poppins
            }
            
            .wrapper {
                width: 350px;
                padding: 20px;
            }

            @import url(https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet);

            /****** LOGIN MODAL ******/

            .loginmodal-container {
                padding: 30px;
                max-width: 350px;
                width: 100% !important;
                background-color: #F7F7F7;
                margin: 0 auto;
                border-radius: 2px;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                overflow: hidden;
                font-family: "Quicksand", sans-serif;
            }

            .loginmodal-container h1 {
                text-align: center;
                font-size: 1.8em;
                font-family: "Quicksand", sans-serif;
            }

            .loginmodal-container input[type=submit] {
                width: 100%;
                display: block;
                margin-bottom: 10px;
                position: relative;
            }

            .loginmodal-container input[type=text],
            input[type=password] {
                height: 44px;
                font-size: 16px;
                width: 100%;
                margin-bottom: 10px;
                -webkit-appearance: none;
                background: #fff;
                border: 1px solid #d9d9d9;
                border-top: 1px solid #c0c0c0;
                /* border-radius: 2px; */
                padding: 0 8px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
            }

            .loginmodal-container input[type=text]:hover,
            input[type=password]:hover {
                border: 1px solid #b9b9b9;
                border-top: 1px solid #a0a0a0;
                -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
                -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            }

            .loginmodal {
                text-align: center;
                font-size: 14px;
                font-family: "Quicksand", sans-serif;
                font-weight: 700;
                height: 36px;
                padding: 0 8px;
                /* border-radius: 3px; */
                /* -webkit-user-select: none;
  user-select: none; */
            }

            .loginmodal-submit {
                /* border: 1px solid #3079ed; */
                border: 0px;
                color: #fff;
                text-shadow: 0 1px rgba(0, 0, 0, 0.1);
                background-color: #ADD8E6;
                padding: 17px 0px;
                font-family: "Quicksand", sans-serif;
                font-size: 14px;
                /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
            }

            .loginmodal-submit:hover {
                /* border: 1px solid #2f5bb7; */
                border: 0px;
                text-shadow: 0 1px rgba(0, 0, 0, 0.3);
                background-color: #ADD8E6;
                /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
            }

            .loginmodal-container a {
                text-decoration: none;
                color: #666;
                font-weight: 400;
                text-align: center;
                display: inline-block;
                opacity: 0.6;
                transition: opacity ease 0.5s;
            }

            .login-help {
                font-size: 12px;
            }

        </style>
    </head>

    <body>
        <header class="default-header">
            <div class="sticky-header">
                <div class="container">
                    <div class="header-content d-flex justify-content-between align-items-center">
                        <div class="logo">
                        </div>
                        <div class="right-bar d-flex align-items-center">
                            <nav class="d-flex align-items-center">
                                <ul class="main-menu">
                                    <div class="login-help">
                                        <a href="register.php">Opret Bruger</a>
                                    </div>
                                </ul>
                                <a href="#" class="mobile-btn"><span class="lnr lnr-menu"></span></a>
                            </nav>
                            <a href="#" data-toggle="modal" data-target="#login-modal" class="lnr lnr-lock"></a>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Area -->
        <section class="banner-area relative">
            <div class="overlay"></div>
            <div class="container">
                <div class="row fullscreen justify-content-center align-items-center">
                    <div class="col-lg-8">
                        <div id="banner_content" class="banner-content text-center">
                            <div class="index-box">
                                <a href="#" data-toggle="modal" data-target="#login-modal">
                                <img src="img/dvkAppLogo.png" style="width: 50%; height: 50%;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Log ind til Dit virtuelle kæledyr</h1><br>
                    <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label class="text-uppercase">Brugernavn</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label class="text-uppercase">Kodeord</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                    </form>
                </div>
            </div>
        </div>
        
                <!-- FOOTER -->
        <footer>
            <div class="container-footer">
                <h1 class="footer-project-name">Dit Virtuelle Kæledyr</h1>
                <div class="footer-text">
                    <p class="footer-copyright">Copyright &copy; 2018 | All rights reserved. Designed by students of University of Southern Denmark. For educational purposes.</p>
                    <p>Email: <a href="mailto:optek17@gmail.com.com">optek17@gmail.com</a></p>
                </div>
            </div>

        </footer>
        <!-- FOOTER END -->

        <script src="js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/modules.js"></script>

    </body>

    </html>
