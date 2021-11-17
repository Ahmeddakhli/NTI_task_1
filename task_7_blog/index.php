<!DOCTYPE html>
<html lang="en">
<head>
  <title>add new blog</title>
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
  <h2>add new blog</h2>
  
  
  <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post"  enctype="multipart/form-data">


  <div class="form-group">
    <label for="exampleInputName">title</label>
    
    <input type="text" class="form-control" name="title" id="exampleInputName" aria-describedby="">
     <?php   
      if (array_key_exists("nameErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["nameErr"]." </span>";
     }   ?>
  <br>
  </div>


    <div class="form-group">
    <label for="exampleInputEmail">discreption </label>
    <input type="text"   class="form-control"  name="disc" id="exampleInputEmail1" aria-describedby="emailHelp">
    <?php   
      if (array_key_exists("addressErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["addressErr"]." </span>";
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
