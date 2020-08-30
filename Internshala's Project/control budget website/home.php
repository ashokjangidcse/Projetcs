<?php
require "common.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home | Ct₹l Budget</title>
        <!--bootstarp css-->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">
       
        
    </head>

    <body>
        <!-- Header -->
        <?php
        include 'header.php';
        $user_id= $_SESSION['user_id'];
        $query = "SELECT title FROM user_plan WHERE user_id='" .$user_id. "' ";
        $result = mysqli_query($con, $query)or die($mysqli_error($con));
        $row = mysqli_fetch_array($result);
        $num = mysqli_num_rows($result);
        ?>
        <!--Header end-->
        <?php if($num == 0){?>
        <div id="content"> 
        <div class="container">
            <div class="row">
                <div  class="col-sm-6">
                <h1>You don't have any active plan</h1>
            </div>
            </div>
            <br/>
            <div class="row">
                      
            <div class="col-sm-offset-4 col-sm-4">
                <div class="jumbotron">
                <center>
                    <a href='createnewplan.php'> <div class="glyphicon glyphicon-plus-sign"></div> Create a New Plan</a>
                </center>
                </div>
            </div>
                
                </div>        
            </div>    
        </div>
        <?php }
        else {
            include 'yourplan.php';
        }
?>
        
        <!--footer-->
        <?php 
        include 'footer.php';
        ?>
        <!--footer end-->
    </body>
</html>