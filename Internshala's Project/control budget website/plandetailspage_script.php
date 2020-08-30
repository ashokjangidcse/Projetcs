<?php

require("common.php");

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $title = $_POST['title'];
  
  $start = $_POST['from'];

  $end = $_POST['to'];

  $initial_budget = $_POST['initial_budget'];
  
  $people =$_POST['people'];
  
  $user_id = $_SESSION['user_id'];
  $people_name = array(); 

// Add people name in array
for ($i = 0; $i < $people; $i++)
{
    $people_name[]=$_POST['people_name'][$i];
   
}
//insert data into user_plan table
    $query = "INSERT INTO user_plan(title,start,end,initial_budget,people,user_id)VALUES('" . $title . "','" . $start . "','" . $end . "','" . $initial_budget . "','" . $people . "','" . $user_id . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $plan_id = mysqli_insert_id($con);
    for($i= 0; $i< $people;$i++)
    {
        $query = "INSERT INTO people(user_id,plan_id,name) VALUES ('" . $user_id . "','" . $plan_id. "','" . $people_name[$i] . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
 
    }
    header('location: home.php');
 
?>
