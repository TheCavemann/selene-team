<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
        $stmt->close();
        }
         
        
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                // header("location: sign-in.php");                
                session_start();
                $_SESSION["success_message"] = "Registration Successful! Login to Continue.";
                header("location: sign-in.php");

                $user = $_POST["username"];
                $assetsFileOfUser = "assetsFor$user.txt";
                $file2 = fopen($assetsFileOfUser,"w");
                fclose($file2);


                $liabilitiesFileOfUser = "liabilitiesFor$user.txt";
                $file3 = fopen($liabilitiesFileOfUser,"w");
                fclose($file3);

                $networthFileOfUser = "networthFor$user.txt";
                $file4 = fopen($networthFileOfUser,"w");
                fclose($fil4);



            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
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
        
        <title>Register | Team Selene | NetWorth Calculator</title>
        
        
        <!-- google roboto font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">
        
        <!-- bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        
        <!-- animate CSS -->
        <link rel="stylesheet" href="css/animate/animate.css">
        
        <!-- style.css -->
        <link rel="stylesheet" href="css/sign-up.css">
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
                                        <h4>Sign Up</h4>   
                                        <p>Please fill this form to create an account.</p>

                                        <form action="" method="post">
                                            <div class="form-group mt-5 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                                <input type="email" class="form-control input-field" id="email" name="username" value="<?php echo $username; ?>" placeholder="Enter Email Address" required>
                                                <span class="help-block color-red"><?php echo $username_err; ?></span>
                                            </div>
                                            <div class="form-group mt-4 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                <input type="password" class="form-control input-field" id="pwd" name="password" value="<?php echo $password; ?>" placeholder="Enter Password" required>
                                                <span class="help-block color-red"><?php echo $password_err; ?></span>
                                            </div>
                                            <div class="form-group mt-4 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                                <input type="password" class="form-control input-field" id="pwd" name="confirm_password" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password" required>
                                                <span class="help-block color-red"><?php echo $confirm_password_err; ?></span>
                                            </div>

                                            <button type="submit" name="submit" class="mt-4 col-3 btn btn-primary btn-lg submit-button">Submit</button>
                                            <button type="reset" class="mt-4 col-3 btn btn-primary btn-lg submit-button float-right">Reset</button>
                                        </form>
                                        <div class="opp-page mt-4">
                                            <p>Already have an account? <a href="sign-in.php">Login here</a></p>

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