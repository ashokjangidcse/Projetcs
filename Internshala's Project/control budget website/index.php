<?php
require "common.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Ct₹l Budget</title>
        <!--bootstarp css-->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
       <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
         <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
        
    </head>

    <body>
        <!-- Header -->
        <?php
        include 'header.php';
        ?>
        <!--Header end-->

        <div >
            <!--Main banner image-->
            <div id = "banner_image">
                <div class="container">	
                    <center>
                        <div id="banner_content">
                            <h1>We help you control your budget</h1>
                            
                            <br/>
                            <a  href="login.php" class="btn btn-danger btn-lg active">Start Today</a>
                        </div>
                    </center>
                </div>
            </div>
            <!--Main banner image end-->

            
        </div>

        <!--Footer-->
        <?php
        include 'footer.php';
        ?>
        <!--Footer end-->

    </body> 
</html>