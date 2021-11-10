<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">User Profile Card</h2>

<?php 
  session_start();
        if (isset( $_SESSION['name'])) {
        
            if($_SERVER['REQUEST_METHOD'] == "POST" )
            {
                session_destroy();
            }
        
        }
        else {
            header('Location: index.php');
            exit();
        }




?>

<div class="card">
  <img src="<?php echo  $_SESSION['image'];?>" alt="John" style="width:100%">
  <h1><?php echo  $_SESSION['name'];?></h1>
  <p class="title"> email ::   <?php echo  $_SESSION['email'];?></p>
  <p class="title"> address ::   <?php echo  $_SESSION['address'];?></p>
  <p class="title"> gender::   <?php echo  $_SESSION['gender'];?></p>
  <div style="margin: 24px 0;">
   
    <a href="<?php echo  $_SESSION['url'];?>"><i class="fa fa-linkedin"></i></a>  
  
  </div>
  <p><form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="submit"  value="log out" />
</form></p>
</div>

</body>
</html>
