<?php
require 'common.php';
if (isset($_POST['id']) && is_numeric($_POST['id'])) {

$user_id= $_SESSION['user_id'];
$plan_id = $_POST['id'];
$total_spent=$_SESSION['total_spent'];
$query = "SELECT *FROM user_plan WHERE user_id='$user_id' AND id='$plan_id'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);
$query_people="SELECT *FROM people WHERE user_id='$user_id' AND plan_id='$plan_id'";
$result_people=mysqli_query($con, $query_people)or die($mysqli_error($con));
$result_people2=mysqli_query($con, $query_people)or die($mysqli_error($con));
$remaining_amount=$row['initial_budget']-$_SESSION['total_spent'];
$individual_share=$_SESSION['total_spent']/$row['people'];
function getProperColor($number)
{
    if ($number > 0 )
        return '#40ff00';
    else if ($number < 0)
        return '#ff0000';
    else if ($var==0)
        return '#000000';
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Ct₹l Budget</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>

    <body>
        <!-- Header -->
        <?php
        include 'header.php';
        ?>
        <!--Header end-->

        <div class="container-fluid decor_bg" style="min-height:590px;">
            <div class="row">
                <div class="container ">
                    <div class="col-lg-8 col-sm-offset-2 col-md-6 col-sm-6">
                        <div class="panel panel-info" >
                            <div class="panel-heading ">
                                <h4>
                                    <center><?php
                                    echo $row['title'];
                                    ?>
                                    <div class="glyphicon glyphicon-user pull-right">
                                    <?php echo $row['people']; ?>    
                                   </div>    
                                </center></h4>
                            </div>
                        <div class="panel-body">    
                        
                       <div class="row">
                           <div class="col-xs-4"><b>Initial Budget</b></div>
                       <div class="col-xs-6 col-sm-offset-2">₹<?php echo $row['initial_budget']; ?></div>
                       </div>
                       <?php while ($row_people = mysqli_fetch_array($result_people)) { ?>
                            <div class="row">
                           <div class="col-xs-4 "><b><?php echo $row_people['name'];?></b></div>
                          <?php $query_expense= "SELECT *FROM expense WHERE plan_id='$plan_id' AND people='".$row_people['name']."'";
                                $result_expense = mysqli_query($con, $query_expense)or die($mysqli_error($con));
                                $row_expense = mysqli_fetch_array($result_expense);
                           ?>
                           <div class="col-xs-6 col-sm-offset-2 ">₹<?php echo $row_expense['amount_spent'];?></div>
                           </div>
                        <?php }?>        
                        <div class="row">
                           <div class="col-xs-4 "><b>Total amount spent</b></div>
                           <div class="col-xs-6 col-sm-offset-2 " style="color:<?php echo getProperColor($_SESSION['total_spent'])?>">₹<?php echo $_SESSION['total_spent']; ?></div>
                       </div>
                         
                       <div class="row">
                           <div class="col-xs-4 "><b>Remaining Amount</b></div>
                           <div class="col-xs-6 col-sm-offset-2 " style="color:<?php echo getProperColor($remaining_amount)?>">₹<?php echo $remaining_amount; ?></div>
                       </div>
                       <div class="row">
                           <div class="col-xs-4 "><b>Individual share</b></div>
                           <div class="col-xs-6 col-sm-offset-2 " style="color:<?php echo getProperColor($individual_share)?>">₹<?php echo $individual_share; ?></div>
                       </div>     
                        <?php while ($row_people = mysqli_fetch_array($result_people2)) { ?>
                            <div class="row">
                           <div class="col-xs-4 "><b><?php echo $row_people['name'];?></b></div>
                          <?php $query_expense= "SELECT *FROM expense WHERE plan_id='$plan_id' AND people='".$row_people['name']."'";
                                $result_expense = mysqli_query($con, $query_expense)or die($mysqli_error($con));
                                $row_expense = mysqli_fetch_array($result_expense);
                                $spent=$row_expense['amount_spent']-$individual_share;
                           ?>
                           <div class="col-xs-6 col-sm-offset-2 " style="color:<?php echo getProperColor($spent)?>">
                               <?php if($spent>0){
                                echo "Gets ₹ $spent";
                               }
                               elseif ($spent<0) {
                                  echo "Owes ₹ $spent"; 
                               }
                               else {
                                   echo "All Settled up";
                               }
                               ?>
                               </div>
                           </div>
                        <?php }?>
                               <form method="post" action="viewplan.php">
                                <div class="row ">
                                    <center><button type="submit" class="btn btn-primary  glyphicon glyphicon-arrow-left">
                                <input  type="hidden" name="id" value="<?php echo $plan_id?>">
                                 back</button>
                                    </center>
                                </div>
                         </form>
                           
                        </div>
                    </div>
                </div>
                </div>
            </div>
    </div>

        <!--Footer-->
        <?php
        include 'footer.php';
        ?>
        <!--Footer end-->

    </body> 
</html>
<?php }?>