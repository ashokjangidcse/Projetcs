<?php

require "common.php";

$initialbudget = $_POST['initial_budget'];
$people = $_POST['people'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Plan Details | Ct₹l Budget</title>
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
    <!-- creating plan after initial budget and people are given-->
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container ">
                    <div class="col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
                         <div class="panel panel-primary ">    
                             <div class="panel-body">
                                 <form  action="plandetailspage_script.php" method="POST">
                                 <div class="row">
                                 <div class="col-sm-12">
                                <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" required>
                            </div>
                                </div>
                                 </div>
                            <div class="row">    
                            <div class="form-group col-sm-6 ">
                                <label for="from">From:</label>
                                <input type="date" class="form-control"  placeholder="dd/mm/yyyy"  name="from" min="2020-01-01" max="2020-1-30"  required>
                            </div>
                            <div class="form-group col-sm-6 ">
                                <label for="from">To:</label>
                                <input type="date" class="form-control"  placeholder="dd/mm/yyyy"  name="to" min="2020-02-01" max="2020-04-20"  required>
                            </div>    
                            </div>
                                <div class="row">
                                <div class="form-group col-sm-6 ">
                                <label for="from">Initial Budget:</label>
                                <input type="number" class="form-control"  value="<?php echo "$initialbudget"?>"  name="initial_budget" >
                                </div>
                                <div class="form-group col-sm-6 ">
                                <label for="people">No. of people</label>
                                <input type="number" class="form-control"  value="<?php echo "$people"?>"  name="people" >
                                </div>
                                </div>
                                <!-- getting all people's name  loop start-->     
                                <?php  for ($i = 0; $i < $people; $i++) {?>
                                 <div class="row">
                                 <div class="col-sm-12">
                                <div class="form-group">
                                <label for="people.$i">people <?php echo $i+1;?></label>
                                <input type="text" class="form-control" placeholder="people <?php echo $i+1;?>" name="people_name[]" required>
                            </div>
                                </div>
                                 </div>
                                <?php } ?>
                                <!--loop is finished-->
                                 <button type="submit" name="submit" class="btn btn-success btn-block">submit</button>
                        </form>
                             </div>
                        </div>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- form end-->
       <?php
        include 'footer.php';
        ?>
    </body>

</html>
