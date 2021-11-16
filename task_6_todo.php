<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todo");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['title']) || empty($_POST['date2']) || empty($_POST['date1'])|| empty($_POST['disc'])) {
			$errors = "You must fill all ";
		}else{
			$title = $_POST['title'];
      $disc = $_POST['disc'];
      $date1 =strtotime( $_POST['date1']);
      $date2 = $_POST['date2'];
      $startdate = strtotime($date2);
      
			$sql = "INSERT INTO tasks (title,disc,date1,date2) VALUES ('$title','$disc','$date1','$startdate')";
			mysqli_query($db, $sql);
			header('location: index.php');
		}
	}	


  if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
  
    mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
    header('location: index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application </title>
</head>
<style>

.heading{
	width: 50%;
	margin: 30px auto;
	text-align: center;
	color: 	#6B8E23;
	background: #FFCCFF;
	border: 2px solid #6B8E23;
	border-radius: 20px;
}
form {
	width: 50%; 
	margin: 30px auto; 
	border-radius: 5px; 
	padding: 10px;
	background: #FFCCFF;
	border: 1px solid #6B8E23;
  border-radius: 20px;
}
form p {
	color: red;
	margin: 0px;
}
.task_input {
	width: 75%;
	height: 15px; 
	padding: 10px;
	border: 2px solid #6B8E23;
  border-radius: 20px;
}
.add_btn {
	height: 39px;
	background: #FFCCFF;
	color: 	#6B8E23;
	border: 2px solid #6B8E23;
 
	padding: 20px 20px;
  border-radius: 20px;
}

table {
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
}

tr {
	border-bottom: 1px solid #cbcbcb;
}

th {
	font-size: 19px;
	color: #6B8E23;
}

th, td{
	border: none;
    height: 30px;
    padding: 2px;
}

tr:hover {
	background: #E9E9E9;
}

.task {
	text-align: left;
}

.delete{
	text-align: center;
}
.delete a{
	color: white;
	background: #a52a2a;
	padding: 1px 6px;
	border-radius: 3px;
	text-decoration: none;
}


</style>
<body>
	<div class="heading">
		<h2 >ToDo List Application </h2>
	</div>

	<form method="post" action="index.php" class="input_form">
  <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
<?php } ?>

  <input type="text" name="title" class="task_input" placeholder="what todo title">
    <br> <br>
    <input type="text" name="disc" class="task_input" placeholder=" disc">
    <br> <br>
    <input type="date" name="date1" class="task_input" >
    <br> <br>
    <input type="date" name="date2" class="task_input" >
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add </button>
	</form>


  <table>
	<thead>
		<tr>
			<th>id</th>
			<th>title</th>
      <th>disc</th>
      <th> start_date</th>
      <th> end_date</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks");

		$i = 1; 
    while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['title']; ?> </td>
        <td class="task"> <?php echo $row['disc']; ?> </td>
        <td class="task"> <?php echo date("Y-m-d",  $row['date1']); ?> </td>
        <td class="task"> <?php echo date("Y-m-d",  $row['date2']); ?> </td>
        <?php if (time() < $row['date2'] ) {
          
         ?>	
				<td class="delete"> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
				</td>
        <?php } ?>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>
</body>
</html>
