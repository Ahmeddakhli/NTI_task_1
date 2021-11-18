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

<h2 style="text-align:center">all blogs</h2>

<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");


      
			$sql = "SELECT * FROM tasks";
		 $tasks=	mysqli_query($db, $sql);
		
	 

  if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    $filename = $_GET['path'];
    mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);

  
    if (file_exists($filename)) {
      unlink($filename);
      echo 'File '.$filename.' has been deleted';
    } else {
      echo 'Could not delete '.$filename.', file does not exist';
    }
    header('location: profile.php');
  }
?>


<div class="row row-cols-1 row-cols-md-3 g-4">
<a  class="delete"  style="	color: white;
	background: blue;
	padding: 1px 6px;
	border-radius: 3px;
	text-decoration: none; " href="index.php"> new blog</a> 
<?php
    
    $i = 1; 
    while ($row = mysqli_fetch_array($tasks)) { 
      
    ?>
  <div class="col">
   
    <div class="card">
     
      <img  class="card-img-top" src="<?php echo $row['img']; ?>" alt="John" style="width:100%">

      <div class="card-body">
        <h5 class="card-title"><?php echo $row['title']; ?></h5>
        <p class="card-text"> <?php echo $row['disc']; ?></p>
        <a  class="delete"  style="	color: white;
                    background: #a52a2a;
                    padding: 1px 6px;
                    border-radius: 3px;
                    text-decoration: none; " href="profile.php?del_task=<?php echo $row['id'] ?>&path=<?php echo $row['img']; ?>">x</a> 
       <a   style="	color: white;
                    background: blue;
                    padding: 1px 6px;
                    border-radius: 3px;
                    text-decoration: none; " href="edit.php?id=<?php echo $row['id'] ?>">edit</a> 

      </div>
    </div>
    
		
  </div>
		
  <?php $i++; }?>
</div>

</body>
</html>
