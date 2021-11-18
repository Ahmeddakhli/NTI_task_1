<!DOCTYPE html>
<html lang="en">
<head>
  <title>edit blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<?php 
session_start();
$errors = [];

$vals = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["title"])) {
    $errors ['nameErr'] = "Name is required";
  } else {
   
    // check if name only contains letters 
    if (!preg_match("/^[a-zA-Z- ']*$/",$_POST["title"])) {
      $errors ['nameErr'] = "Only letters allowed";
    }
    else{
        $vals ['title'] = $_POST["title"];
    }
  }



  if (empty($_POST["disc"])) {
    $errors ['addressErr']= " discription is required";
  } else {
    
   
    if (!preg_match("/^[a-zA-Z-']*$/",$_POST["disc"])) {
      $errors ['addressErr']= "Invalid discription , discription must be a chars";
    }
    else {
        if (strlen($_POST["disc"])<10) {
            $errors ['addressErr']= "Invalid discription , discription must be at least 10 chars";
          } 
          else{
            $vals ['disc'] = $_POST["disc"];
        }
    }    
     
  }



 
    // code ..... 
    if(!empty($_FILES['image']['name'])){

     
      $file_name =  $_FILES['image']['name'];   
      $file_type =  $_FILES['image']['type'];   
      $file_tmp  =  $_FILES['image']['tmp_name'];
    
       $file_ex   = explode('.',$file_name);
       $updated_ex = strtolower(end($file_ex));
  
       //  $file_ex[count($file_ex)-1];
      //      echo end($file_ex);
      $allowed_ex = ["png","jpg"];
  
      if(in_array($updated_ex, $allowed_ex)){
          // code .... 
        $finalName = rand().time().'.'.$updated_ex;
  
           $disPath = './uploads/'.$finalName;
  
         if(move_uploaded_file($file_tmp,$disPath)){
            $vals ['image'] = $disPath;
        
         }else{
            $errors ['imageErr']=  'Error Try Again';
         }
  
      }else{
        $errors ['imageErr']=   '* inValid Extension';
      }
  
      }
  
    }

   


if (count($vals)>=2) {
    
   	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");

	
			$title = $vals['title'];
      $disc = $vals['disc'];
      $img_name = $vals ['image'];
      $id = $_GET['id'];
     
   
			$sql = "UPDATE tasks SET title=$title, disc=$disc,img=$img_name WHERE id= $id";
			mysqli_query($db, $sql);
		
   header('Location: profile.php');
    exit();
    
}
$id = $_GET['id'];
$sql = "SELECT * FROM tasks WHERE id=$id ";

$db = mysqli_connect("localhost", "root", "", "todo");

$result = mysqli_query($db, $sql);
  $blog = mysqli_fetch_array($result);

?>


<div class="container">
  <h2>edit blog</h2>
  
  
  <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post"  enctype="multipart/form-data">


  <div class="form-group">
    <label for="exampleInputName">title</label>
    
    <input type="text" class="form-control" name="title"  value="<?php  echo  $blog["title"] ?>"id="exampleInputName" aria-describedby="">
     <?php   
      if (array_key_exists("nameErr", $errors)) {
      echo "<span  style='color: red;'>".$errors["nameErr"]." </span>";
     }   ?>
  <br>
  </div>


    <div class="form-group">
    <label for="exampleInputEmail">discreption </label>
    <input type="text"   class="form-control" value="<?php  echo  $blog["disc"] ?>" name="disc" id="exampleInputEmail1" aria-describedby="emailHelp">
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
