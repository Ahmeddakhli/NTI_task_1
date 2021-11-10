<?php

session_start();
$errors = [];

$vals = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["name"])) {
    $errors ['nameErr'] = "Name is required";
  } else {
   
    // check if name only contains letters 
    if (!preg_match("/^[a-zA-Z- ']*$/",$_POST["name"])) {
      $errors ['nameErr'] = "Only letters allowed";
    }
    else{
        $vals ['name'] = $_POST["name"];
    }
  }

  if (empty($_POST["email"])) {
    $errors ['emailErr'] = "Email is required";
   
  } else {
  
    // check if e-mail address is well-formed
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $errors ['emailErr']= "Invalid email format";
    }
    else{
        $vals ['email'] = $_POST["email"];
    }
  }
    
  if (empty($_POST["url"])) {
    $errors ['urlErr']= " URL is required";
  } else {
  
    
    if (!filter_var($_POST["url"],FILTER_VALIDATE_URL)) {
      $errors ['urlErr']= "Invalid URL";
    }    
    else{
        $vals ['url'] = $_POST["url"];
    }
  }

  if (empty($_POST["address"])) {
    $errors ['addressErr']= " address is required";
  } else {
    
   
    if (!preg_match("/^[a-zA-Z-']*$/",$_POST["address"])) {
      $errors ['addressErr']= "Invalid address , address must be a chars";
    }
    else {
        if (strlen($_POST["address"])<10) {
            $errors ['addressErr']= "Invalid address , address must be at least 10 chars";
          } 
          else{
            $vals ['address'] = $_POST["address"];
        }
    }    
     
  }


  if (empty($_POST["password"])) {
    $errors ['passwordErr']= " password is required";
  } else {
  
   
    if (strlen($_POST["password"])<6) {
      $errors ['passwordErr']= "Invalid password , Password must be at least 6";
    } 
    else{
        $vals ['password'] = $_POST["password"];
    }   
  }

  if (empty($_POST["gender"])) {
    $errors ['genderErr']= " gender is required";
  } else {
   
    $vals ['gender'] = $_POST["gender"];
     
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

   


if (count($vals)==7) {
    
    foreach ($_POST as $key => $value) {
        $_SESSION[$key]=$value;
    }
    $_SESSION['image'] = $disPath;
   header('Location: profile.php');
    exit();
}
if (isset( $_SESSION['name'])) {

    header('Location: profile.php');
    
}
?>