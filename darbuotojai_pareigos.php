<?php session_start();
 if (isset($_SESSION)) {
if ( $_SESSION['valid'] == true) {
	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SQL fundamentals</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<style type="text/css">
 
 a.btn.btn-primary {
 	    margin-top: 10px;
	}
	a.add-emp {
		    padding: 15px 50px 15px 50px;
	}
 
td {
	vertical-align: middle !important;
}
</style>

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Baltic Talents</a>
			</div>

			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<a  class="btn btn-primary" href="darbuotojai_pareigos.php">Firm Statistics</a>
					<a  class="btn btn-primary" href="darbuotojas_prisijungti.php">Log out</a>
				</ul>


			</div>
		</div>
	</nav>
<?php
    $db = mysqli_connect('localhost', 'root', '', 'naujas_localhost');
    $resultPosition = mysqli_query($db, 'SELECT * FROM positions') or die (mysqli_error($db));
    if (isset( $_GET['pareigos'])){
     $result = mysqli_query($db, 'SELECT * FROM employees WHERE position_id='.$_GET['pareigos']) or die (mysqli_error($db));   
    }else{
    $result = mysqli_query($db, 'SELECT * FROM employees') or die (mysqli_error($db));
        }
    ?>
	<div class="container" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Employees by Position</h1>
				</div>
			</div>
				<div class="col-md-12">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading"><strong>Employees list</strong></div>


					<!-- Table -->
					<table class="table">
						<tr>
							<th></th>
							<th>Name</th>
							<th>Surname</th>
							<th>Tel:</th>
							<th>Education</th>
							<th>Salary</th>
							<th></th>
						</tr>
	<?php
        $rowNumber=0;        
                                                     
        while ($row = mysqli_fetch_assoc($result)){
        $rowNumber++;
		echo '
						<tr>
							<td><strong>'.$rowNumber.'</strong></td>
							<td>'.$row["name"].'</td>
							<td>'.$row["surname"].'</td>
							<td>'.$row["phone"].'</td>
							<td>'.$row["education"].'</td>
							<td>'.$row["salary"].' EUR</td>
							<td><a href="darbuotojas.php?id='.$row["id"].'" class="btn btn-primary">More detail</a></td>
	<td><a href="darbuotojas_redaguoti.php?id='.$row["id"].'" class="btn btn-primary">Edit</a></td>
							<td><a class="btn btn-primary" href="istrinti.php?id='.$row["id"].'"  >Delete</a></td>
						</tr>'
        ;
    }; ?>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading"><strong>Base Salary</strong></div>

					<!-- Table -->
					<table class="table">
					<tr>
							<th>Position</th>
							<th>Base Salary</th>
							<th></th>
						</tr>
					<?php

                         while ($row = mysqli_fetch_assoc($resultPosition)){
						echo '

						<tr>
							<td>'.$row["name"].'</td>
							<td>.'.$row["base_salary"].' EUR </td>
							<td><a href="darbuotojai_pareigos.php?pareigos='.$row["id"].'" class="btn btn-primary">Show Employees</a></td>
						</tr>';
						}
                            ?>
                            
					</table>

				</div>

			</div>
			<div class="col-md-6">
                            	<a href="darbuotojas_prideti.php" class=" add-emp btn btn-primary"><strong>Add new Employee</strong></a>
                            </div>
		</div>


	</div>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>

<?php 
} else {
	echo '<script> location.href="darbuotojas_prisijungti.php"</script>';
	}
} 


 ?>