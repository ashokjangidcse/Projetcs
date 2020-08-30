<?php
require 'common.php';
$user_id= $_SESSION['user_id'];
$query = "SELECT *FROM user_plan WHERE user_id='" .$user_id. "' ";
$result = mysqli_query($con, $query)or die($mysqli_error($con));

?>
<!--showing user's plan-->.
<div class="container-fluid decor_bg" style="min-height:590px;">
            <div class="row">
                <div class="container ">
                <div class="row">
                 <div  class="col-sm-6 col-sm-offset-1 ">
                 <h1>Your Plans</h1>
                 </div>
                 </div>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="col-lg-4 col-sm-offset-1 col-md-6 col-sm-6">
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
                           <div class="col-xs-2"><b>Budget</b></div>
                       <div class="col-xs-8 col-sm-offset-2">₹<?php echo $row['initial_budget']; ?></div>
                       </div>
                       <div class="row">
                        <div class="col-xs-2 "><b>Date</b></div>
                        <div class="col-xs-8 col-sm-offset-2"><?php echo date_format(date_create($row['start']),"jS M")."-".date_format(date_create($row['end']),"jS M Y"); ?></div>
                       </div>
                        </div>
                            <form method="post" action="viewplan.php">
                                <button type="submit" class="btn btn-block panel panel-primary"><input  type="hidden" name="id" value="<?php echo $row['id']?>">
                            View Plan</button>
                            </form>
                    </div>
                </div>
                    <?php }?>
            </div>
        </div>
    <a href="createnewplan.php" class="glyphicon glyphicon-plus-sign pull-right" style="font-size: 80px; padding-top: 200px"></a>
</div>


    

    

 
