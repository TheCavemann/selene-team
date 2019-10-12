<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
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
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
        $stmt->close();
        }
        
        
    }
    
    // Close connection
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Team Selene | NetWorth Calculator</title>
        
        
        <!-- google roboto font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">
        
        <!-- bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        
        <!-- style.css -->
        <link rel="stylesheet" href="css/login.css">
    </head>
    
    <body>
        
        <!-- LOGIN -->
        <section id="login-page">
        
            <!-- Login right side with diagonal BG parallax -->
            <div id="login-bg-diagonal" class="bg-parallax d-none d-md-block">
                <div id="heading-primary">
                    <h1>NetWorth <br />Calculator</h1>
                </div>
            </div>
            
            <!-- Login left side with content -->
            <div class="container login-cont">
                
                <div class="parent">
                    <div class="row insideParent d-flex justify-content-center">
                        <div class="col-md-10 right-side">
                            <div id="content-box">

                                <div id="heading-primary-right" class="d-md-none">
                                    <h1>NetWorth <br />Calculator</h1>
                                </div>
                                <div id="content-box-outer">
                                    <div id="content-box-inner">
                                        <h4>Login</h4>
                                        <?php 
                                            if(isset($_SESSION["success_message"]) == true) {
                                                echo '<p class="color-green">';
                                                echo $_SESSION["success_message"]; // Or show the box, or whatever
                                                echo '</p>';
                                            }else {
                                                echo '<p>';
                                                echo 'Please fill in your credentials to login.';
                                                echo '</p>' ;
                                            }
                                            $_SESSION["success_message"] = null; // Clean up 
                                        ?>

                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <div class="form-group mt-5 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                                <input type="email" class="form-control input-field" id="email" name="username" value="<?php echo $username; ?>" placeholder="Enter Email Address" required>
                                                <span class="help-block color-red"><?php echo $username_err; ?></span>
                                            </div>
                                            <div class="form-group mt-4 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                <input type="password" class="form-control input-field" id="pwd" name="password"  placeholder="Enter Password" required>
                                                <span class="help-block color-red"><?php echo $password_err; ?></span>
                                            </div>
                                            <div class="container mt-4">
                                                <div class="row d-flex justify-content-between">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                          <input class="form-check-input" type="checkbox"> Remember me
                                                        </label>
                                                    </div>
                                                    <div class="reset-pwd">
                                                        <a href="forgot_password.php">Forgot Password ?</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" name="submit" class="mt-4 col-3 btn btn-primary btn-lg submit-button">Login</button>
                                        </form>
                                        <div class="opp-page mt-4">
                                            <p>Don't have an account? <a href="sign-up.php">Sign Up Now</a></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            
        
        </section>
        
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        
        <!-- bootstrap Javascript -->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        
        <!-- animated wow JS file -->
        <script src="js/wow/wow.min.js"></script>
        
        <!-- Javascript file -->
        <script src="js/script.js"></script>
    </body>
</html>