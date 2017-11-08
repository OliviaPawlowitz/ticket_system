<?php

include "classAction.php";


?>
<!DOCTYPE html>
<html>
		<head>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="viewport" content="width=device-width,initial-scale=1.0"/>

			<title>Ticket System</title>

			<link rel="stylesheet" href="" type="text/css" />

			<script type="text/javascript"></script>
			
		</head>

			<body>


			<div class="container">

			<div class="jumbotron">

			<h1>Ticket System <small>Probe IPA</small></h1>


			<a href="http://localhost/login/login.php" name="logout" class="btn btn-primary">Logout</a>


			</div>

		</div>
	<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
	<div class="panel panel-primary">
	<div class="panel-heading"> Ticket Details</div>
	<div class="panel-body">

	<?php
		
		if(isset($_GET["update"])){

		
	$id = $_GET["id"];
	$where = array("id"=>$id,);
	$row = $obj->select_record("tickets",$where);

	?>
	
	
	<form method="post" action="classAction.php">
	<table class="table table-hover">
	<tr>

	<td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>

	</tr>

	<tr>

	<td>Name</td>

	<td><input type="text" class="form-control" value="<?php echo $row["t_name"]; ?>" name="name" placeholder=" Ticket name"></td>

	</tr>

	<tr>

	<td>Category</td>

	<td><input type="text" class="form-control" name="category" value="<?php echo $row["category"]; ?>" placeholder=" Category"></td>

	</tr>

	<tr>

	<td>Departement</td>

	<td><input type="text" class="form-control" name="departement" value="<?php echo $row["departement"]; ?>" placeholder=" Departement"></td>

	</tr>

	<tr>

	<td>Priority</td>

	<td><input type="text" class="form-control" name="priority" value="<?php echo $row["priority"]; ?>" placeholder=" Priority"></td>

	</tr>

	<tr>

	<td>Description</td>

	<td><input type="text" class="form-control" name="description" value="<?php echo $row["description"]; ?>" placeholder=" Description"></td>

	</tr>


	<tr>

	<td colspan="2" align="c"><input type="submit" class="btn btn-primary" name="edit" value="Update"></td>

	</tr>

	</table>

	</form>


	<?php

	}else{

	
	?>

	
	<form method="post" action="classAction.php">

	
	<table class="table table-hover">

	<tr>
	<td>Ticket Name</td>

	<td><input type="text" class="form-control" name="name" placeholder=" Ticket name"></td>

	</tr>

	<tr>

	<td>Category</td>

	<td><input type="text" class="form-control" name="category" placeholder=" Category"></td>

	</tr>

	<tr>

	<td>Departement</td>

	<td><input type="text" class="form-control" name="departement" placeholder=" Departement"></td>

	</tr>

	<tr>

	<td>Priority</td>

	<td><input type="text" class="form-control" name="priority" placeholder=" Priority"></td>

	</tr>

	<tr>

	<tr>

	<td>Description</td>

	<td><input type="text" class="form-control" name="description" placeholder=" Description"></td>

	</tr>

	<tr>

	<td colspan="2" align="c"><input type="submit" class="btn btn-primary" name="submit" value="Store"></td>

	</tr>

	</table>

	</form>



	<?php

	}


	?>



	</div>

	</div>

	</div>

	
	<div class="col-md-3"></div>

	</div>


	</div>

		<div class="container">
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

		<table class="table table-bordered">

		<tr>
		<th>Number</th>
		<th>Ticket Name</th>
		<th>Category</th>
		<th>Departement</th>
		<th>Priority</th>
		<th>Description</th>

<th>&nbsp;</th>
<th>&nbsp;</th>

		</tr>
		
	<?php
	$myrow = $obj->fetch_record("tickets");
	foreach ($myrow as $row) {
	//breaking point
	?>
	
		<tr>
		<td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["t_name"]; ?></td>
		<td><b><?php echo $row["category"]; ?></b></td>
		<td><b><?php echo $row["departement"]; ?></b></td>
		<td><b><?php echo $row["priority"]; ?></b></td>
		<td><b><?php echo $row["description"]; ?></b></td>
		<td><a href="index.php?update=1&id=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a></td>
		<td><a href="classAction.php?delete=1&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
		</tr>


	<?php
	}
	
	?>

				</table>
			</div>
		<div class="col-md-2"></div>
	</div>
</div>

</body>
</html>
