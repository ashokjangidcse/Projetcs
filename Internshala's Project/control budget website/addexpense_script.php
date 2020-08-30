<?php

require("common.php");

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $title = $_POST['title'];
  
  $date = $_POST['date'];

  $amount_spent = $_POST['amount_spent'];

  $people_name = $_POST['people_name'];
  
  $user_id = $_SESSION['user_id'];
  $plan_id = $_POST['id'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imagename=basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $query = "INSERT INTO expense(title,date,amount_spent,people,plan_id,user_id)VALUES('" . $title . "','" . $date . "','" . $amount_spent . "','" . $people_name . "','" . $plan_id . "','" . $user_id . "')";
  mysqli_query($con, $query) or die(mysqli_error($con));
  $expense_id = mysqli_insert_id($con);
 
 /* function GetImageExtension($imagetype){
      if(empty($imagetype)) return FALSE;
       switch ($imagetype){
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default :return FALSE;    
        }
  }
  
  if(!empty($_FILES["uploadedimage"]["name"])){
      $file_name=$_FILES["uploadedimage"]["name"];
      $temp_name=$_FILES["uploadedimage"]["tmp_name"];
      $imgtype=$_FILES["uploadedimage"]["type"];
      $ext = GetImageExtension($imgtype);
      $imagename=date("d-m-Y")."-".time().$ext;
      $target_path="img/".$imagename;
      if(move_uploaded_file($temp_name, $target_path)){
          $query_image="INSERT into bills (plan_id,expense_id,bill) VALUES ('".$plan_id."','".$expense_id."','".$imagename."')";
           mysqli_query($con, $query_image) or die(mysqli_error($con));
      }
  }*/
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $query_image="INSERT into bills (plan_id,expense_id,bill) VALUES ('".$plan_id."','".$expense_id."','".$imagename."')";
           mysqli_query($con, $query_image) or die(mysqli_error($con));
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
  header('location:home.php'); 
?>
