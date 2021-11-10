<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<?php 

require 'helpers.php';
?>


<div class="container">
  <h2>Register</h2>
  
  
  <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post"  enctype="multipart/form-data">


  <div class="form-group">
    <label for="exampleInputName">Name</label>
    
    <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
     <?php   
      if (array_key_exists("nameErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["nameErr"]." </span>";
     }   ?>
  <br>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="text"   class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <?php   
      if (array_key_exists("emailErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["emailErr"]." </span>";
     }   ?>

    </div>

    <div class="form-group">
    <label for="exampleInputEmail">address </label>
    <input type="text"   class="form-control"  name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <?php   
      if (array_key_exists("addressErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["addressErr"]." </span>";
     }   ?>
    </div>
    
  <div class="form-group">
    <label for="exampleInputEmail">url</label>
    <input type="text"   class="form-control"  name="url" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <?php   
      if (array_key_exists("urlErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["urlErr"]." </span>";
     }   ?>
    </div>


  <div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <input type="password"   class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    <?php   
      if (array_key_exists("passwordErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["passwordErr"]." </span>";
     }   ?>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword"> gender :: </label>
    <input type="radio" name="gender" value="female"> Female
    <input type="radio" name="gender" value="male"> Male
    <?php   
      if (array_key_exists("genderErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["genderErr"]." </span>";
     }   ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  name="image">
    <?php   
      if (array_key_exists("imageErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["imageErr"]." </span>";
     }   ?>
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
