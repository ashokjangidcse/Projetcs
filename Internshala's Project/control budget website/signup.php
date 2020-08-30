<?php
require "common.php";
if(isset($_SESSION['email'])){
header("location:home.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Sign Up | Ct₹l Budget</title>
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
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container ">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                            <h2>SIGN UP</h2>
                            </div>
                        <div class="panel-body">    
                        <form  action="signup_script.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input class="form-control" placeholder="Name" name="name"  required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                               <input type="email" class="form-control"  placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="email" required>
                                <?php
                                if(isset($_GET["m1"])){
                                  echo $_GET['m1'];
                                }
                                ?>                                
                            </div>
                            <div class="form-group ">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" placeholder="Password" pattern=".{6,}" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Phone Number:</label>
                            <input type="text" class="form-control"  placeholder="Contact" maxlength="10" size="10" name="contact" required>
                                <?php
                                if(isset($_GET["m2"])){
                                  echo $_GET['m2'];
                                }
                                ?>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                        </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php
        include 'footer.php';
        ?>
    </body>

</html>
