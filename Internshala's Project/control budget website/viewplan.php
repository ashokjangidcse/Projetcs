<?php
require 'common.php';
if (isset($_POST['id']) && is_numeric($_POST['id'])) {

$user_id= $_SESSION['user_id'];
$plan_id = $_POST['id'];
//query for user plan table to get all plan
$query = "SELECT *FROM user_plan WHERE user_id='$user_id' AND id='$plan_id'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);
//query for getting all people in a plan
$query_people="SELECT *FROM people WHERE user_id='$user_id' AND plan_id='$plan_id'";
$result_people=mysqli_query($con, $query_people)or die($mysqli_error($con));
//query for getting all expenses
$query_expense= "SELECT *FROM expense WHERE plan_id='$plan_id'";
$result_expense = mysqli_query($con, $query_expense)or die($mysqli_error($con));
$_SESSION['total_spent']=0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home | Ct₹l Budget</title>
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
        ?>
        <!--header end-->
        
    <div class="container-fluid decor_bg" style="min-height:590px;">
            <div class="row">
                <!--showing plan-->
                <div class="container ">
                    <div class="col-lg-6 col-sm-offset-1 col-md-6 col-sm-6">
                        <div class="panel panel-info" >
                            <div class="panel-heading ">
                                <h4>
                                    <div class="col-sm-6 col-sm-offset-3">   <?php
                            echo $row['title'];
                            ?></div>
                                <div class="glyphicon glyphicon-user ">
                                <?php echo $row['people']; ?>    
                                </div></h4>
                            </div>
                        <div class="panel-body">    
                        
                       <div class="row">
                           <div class="col-xs-4"><b>Budget</b></div>
                       <div class="col-xs-6 col-sm-offset-2">₹<?php echo $row['initial_budget']; ?></div>
                       </div>
                       <div class="row">
                           <div class="col-xs-4 "><b>Remaining Amount</b></div>
                       <div class="col-xs-6 col-sm-offset-2  text-success">₹<?php echo $row['initial_budget']; ?></div>
                       </div>
                       <div class="row">
                        <div class="col-xs-4 "><b>Date</b></div>
                        <div class="col-xs-6 col-sm-offset-2"><?php echo date_format(date_create($row['start']),"jS M")." - ".date_format(date_create($row['end']),"jS M Y"); ?></div>
                       </div>
                        </div>
                    </div>
                </div>
                    <!--showing plan end-->
                <!--button for expense distribution-->
                <div class="col-lg-4">
                <form method="post" action="expense_distribution.php">
                                <button type="submit" class="btn btn-block panel panel-primary">
                                <input  type="hidden" name="id" value="<?php echo $row['id']?>">
                            Expense Distribution</button>
                </form>
                </div>
                <!--button end-->
             </div>
            </div>
        <!--showing expenses-->
                <div class="row">
                     <?php while ($row_expense = mysqli_fetch_array($result_expense)) { 
                    $query_bill = "SELECT *FROM bills WHERE expense_id='".$row_expense['id']."' AND plan_id='$plan_id'";
                    $result_bill = mysqli_query($con, $query_bill)or die($mysqli_error($con));
                    $row_bill = mysqli_fetch_array($result_bill);
                    $num = mysqli_num_rows($result_bill);
                   ?>
                    <div class="col-lg-3 col-sm-offset-1 col-md-6 col-sm-6">
                        <div class="panel panel-info" >
                            <div class="panel-heading ">
                                <h4>
                                    <center>   <?php
                                     echo $row_expense['title'];
                                     ?></center></h4>
                            </div>
                        <div class="panel-body">    
                        
                       <div class="row">
                           <div class="col-xs-3"><b>Amount</b></div>
                       <div class="col-xs-7 col-sm-offset-2">₹<?php echo $row_expense['amount_spent']; ?></div>
                       </div>
                       <div class="row">
                           <div class="col-xs-3"><b>Paid by</b></div>
                       <div class="col-xs-7 col-sm-offset-2"><?php echo $row_expense['people']; ?></div>
                       </div>     
                       <div class="row">
                        <div class="col-xs-3 "><b>Paid on</b></div>
                        <div class="col-xs-7 col-sm-offset-2"><?php echo date_format(date_create($row_expense['date']),"jS M"); ?></div>
                       </div>
                        <div class="row"> 
                            <center class="btn-outline-primary panel-footer">    
                        <div class="text-primary" >
                            <?php
                            
                            if($num==0){
                                echo "You Don't have Bill";
                            }
                            else {
                                  
                                ?><a href="#" data-toggle="modal" data-target="#viewbill">View Bill</a>
                                <div class="modal fade" id="viewbill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                    <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Bill</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                    </div>
                                   <div class="modal-body">
                                       <img src="upload/<?php  echo $row_bill['bill']?>" height=500 width=300 />
                                   </div>
                                      <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                 </div>
                                </div>
                            <?php
                            }
                             
                            ?></div>
                            </center>
                        </div>
                        </div>
                    </div>
                </div>
                    <?php 
                    $_SESSION['total_spent']=$_SESSION['total_spent']+$row_expense['amount_spent'];
                     }?>
                </div>
        <!--showing expenses end-->
        
        <!--add expense-->
        <div class="col-lg-4 col-lg-offset-8 col-sm-4 col-sm-offset-6">
                         <div class="panel panel-primary ">    
                             <div class="panel-body">
                                 <form  action="addexpense_script.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" required>
                                 </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control"  placeholder="dd/mm/yyyy"  name="date" min="<?php echo $row['start'];?>" max="<?php echo $row['end'];?>"  required>
                            </div>
                            
                            <div class="form-group">
                                <label for="amount_spent">Amount Spent</label>
                                <input type="number" class="form-control"  placeholder="Amount spent" min="0" name="amount_spent"  required>
                                </div>
                                <div class="form-group">
                                <label for="people">Choose</label>
                                 <select class="form-control" name="people_name">
                                   <?php while ($row_people = mysqli_fetch_array($result_people)) { ?>
                                     <option><?php echo $row_people['name'];?></option>
                                   <?php }?>
                                </select>
                                </div>  
                                <div class="form-group">
                                <label for="fileToUpload">Upload Bill</label>
                                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" >
                                </div>
                                     <input  type="hidden" name="id" value="<?php echo $row['id']?>">
                                     <input type="submit" value="ADD" name="submit" class="panel-footer btn btn-outline-primary btn-block">
                            
                                </form>
                             </div>
                        </div>    
                        </div>
                    
        </div>
    <!--add expense end-->
     
       <!--footer-->
        <?php 
        include 'footer.php';
        ?>
        <!--footer end--> 
         

</body>
</html>
<?php }
 else {
     header('location:home.php'); 
 } 
 
?>
    

    

 
