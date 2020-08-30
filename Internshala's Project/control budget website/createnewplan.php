<?php
require "common.php";
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
                    <div class="col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-success" >
                            <div class="panel-heading">
                            <h2>Create New Plan</h2>
                            </div>
                        <div class="panel-body">    
                            <form  action="plandeatailspage.php" method="POST">
                            <div class="form-group">
                                <label for="name">Initial Budget:</label>
                                <input type="number" class="form-control" placeholder="Initial budget(Ex. 4000)" name="initial_budget" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="people">How many peoples you want to add in your group:</label>
                                <input type="number" class="form-control"  placeholder="No. of people"  name="people" min="0" required>
                                
                            </div>
                            
                                <button type="submit" name="next" class="btn btn-success btn-block">Next</button>
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
