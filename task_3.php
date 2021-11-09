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


$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["name"])) {
    $errors ['nameErr'] = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters 
    if (!preg_match("/^[a-zA-Z-']*$/",$name)) {
      $errors ['nameErr'] = "Only letters allowed";
    }
  }

  if (empty($_POST["email"])) {
    $errors ['emailErr'] = "Email is required";
   
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors ['emailErr']= "Invalid email format";
    }
  }
    
  if (empty($_POST["url"])) {
    $errors ['urlErr']= " URL is required";
  } else {
    $url = $_POST["url"];
    
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
      $errors ['urlErr']= "Invalid URL";
    }    
  }

  if (empty($_POST["address"])) {
    $errors ['addressErr']= " address is required";
  } else {
    $address = $_POST["address"];
   
    if (!preg_match("/^[a-zA-Z-']*$/",$address)) {
      $errors ['addressErr']= "Invalid address , address must be a chars";
    }    
    if (strlen($address)<10) {
      $errors ['addressErr']= "Invalid address , address must be at least 10 chars";
    }  
  }


  if (empty($_POST["password"])) {
    $errors ['passwordErr']= " password is required";
  } else {
    $password = $_POST["password"];
   
    if (strlen($password)<6) {
      $errors ['passwordErr']= "Invalid password , Password must be at least 6";
    }    
  }



}

if (count($errors)<1) {
  foreach ($_POST as $key => $value) {
    echo $value."<br>";
   }
}

?>
<div class="container">
  <h2>Register</h2>
  
  
  <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post">


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
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>
