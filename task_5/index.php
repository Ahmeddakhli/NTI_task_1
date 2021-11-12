<?php
// get Api
$data =  file_get_contents('http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz');

 // open file to w
$file =  fopen('data.txt','w')   or  die("unable to open file");

    fwrite($file,$data);
fclose($file);

 
// open file to read
    $file =  fopen('data.txt','r')   or  die("unable to open file");

        $file_data= fread($file,filesize('data.txt'));

    fclose($file);
 
    
   $dataArray = json_decode($file_data,true);

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>products</title>
  </head>
  <body>
    <h1> all products </h1>


 <div class="row row-cols-1 row-cols-md-3 g-4">

 <?php  

   foreach ($dataArray['data'] as $values) {

 ?>
 
  <div class="col-lg-3">
    <div class="card">
      <img src="uploads/517535671636616170.png" class="card-img-top" >
      <div class="card-body">
        <h5 class="card-title"><?php    echo $values['products_name'];  ?></h5>
        <p class="card-text"> <?php    echo $values['products_slug'];  ?></p>
      </div>
      <ul class="list-group list-group-flush">
    <li class="list-group-item">id :: <?php    echo $values['products_id'];  ?></li>
    <li class="list-group-item">categories_name::  <?php    echo $values['categories_name'];  ?> </li>
    <li class="list-group-item">products_price =  <?php    echo $values['products_price'];  ?></li>
  </ul>
    </div>
  </div>

 <?php } ?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>