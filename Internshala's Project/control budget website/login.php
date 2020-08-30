<?php
require "common.php";
if(isset($_SESSION['email'])){
header("location:home.php");
 }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Log In | Ct₹l Budget</title>
        <!--bootstarp css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--custom css-->
        <link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>

    <body>
        <?php
        include 'header.php';
        ?>
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                
                                <form role="form" action="login_submit.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                                </form>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">click here to signup</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
    </body>
</html>
