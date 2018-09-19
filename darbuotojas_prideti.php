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

<title>Baltic Talents</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<style type="text/css">
a.btn.btn-primary {
 	    margin-top: 10px;
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

	<div class="container" id="content" tabindex="-1">
		

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading">New Employee</div>

					<div class="panel-body">

						<form action="" method="post">
								
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
								<label for="name">Vardas</label> 
								<input name="name" type="text" class="form-control" id="vardas" placeholder="Vardas">
							</div>
							<div class="form-group">
								<label for="surname">Surname</label> 
								<input name="surname" type="text" class="form-control" id="surname" placeholder="Surname">
							</div>
							<div class="form-group">
								<label for="gender">Gender</label> 
								<select name="gender" id="gender" class="form-control">
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tel">Telephone</label> 
								<input name="phone" type="text" class="form-control" id="tel" placeholder="Telephone">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<label for="position">Position</label> 
								<select name="position_id" id="position" class="form-control">
      		<?php


      		$db = mysqli_connect('localhost', 'root', '', 'naujas_localhost');
				   	$result = mysqli_query($db,"select * from positions");
				    	while ($row = mysqli_fetch_assoc($result)){
          ?>
									<option value="<?php echo $row['id']; ?>">   <?php echo $row['name']; ?></option>
                                                                    <?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="education">Education</label>
								<input name="education" type="text" class="form-control" id="education" placeholder="Education">
							</div>
							
							<div class="form-group">
								<label for="salary">Salary</label>
								<input name="salary" type="text" class="form-control" id="salary" placeholder="Salary">
							</div>
							
							</div>
							<div class="clearfix"></div>
								<div class="col-md-12">
								<input type="submit" class="btn btn-primary" value="Add">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>


	</div>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

    if (isset($_POST) && !empty($_POST)) {
   
        $cols = Array();
        $vals = Array();
        foreach ($_POST as $key => $value) {
            $vals[$key] = !empty($value)?"'" . $value ."'":"''";
            $cols[] = $key;
            
            if ($key === 'salary') { $vals[$key] = (int)$value; }
        }
        
        $cols = implode(",",$cols);
        $vals = implode(",",$vals);
        
        

        mysqli_query($db,"INSERT INTO employees ($cols) VALUES($vals)") or die(mysqli_error($db));
    }
?>
<?php 
} else {
	echo '<script> location.href="darbuotojas_prisijungti.php"</script>';
	}
}

 ?>