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
        if (strlen($_POST["disc"])<100) {
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
  
      }else{
        $errors ['imageErr']= '* Image Field Required';
      }
  
    }

   


if (count($vals)==3) {
    
   	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");

	
			$title = $vals['title'];
      $disc = $vals['disc'];
      $img_name = $vals ['image'];
     
     
      
			$sql = "INSERT INTO tasks (title,disc,img) VALUES ('$title','$disc','$img_name')";
			mysqli_query($db, $sql);
		
   header('Location: profile.php');
    exit();
}

?>