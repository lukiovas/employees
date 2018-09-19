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
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>SQL fundamentals</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
<style type="text/css">
a.btn.btn-primary {
 	    margin-top: 10px;
	}
.curr {
	text-align: right;
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
				<div class="page-header">
				<?php
                    $npd=149;
                    $db = mysqli_connect('localhost', 'root', '', 'naujas_localhost');

                    $result = mysqli_query($db, 'SELECT * FROM employees WHERE id='.$_GET["id"]) or die (mysqli_error($db)); 
                    $row = mysqli_fetch_assoc($result);
                    
                     $resultPareigos = mysqli_query($db, 'SELECT * FROM positions WHERE id='.$row["position_id"]) or die (mysqli_error($db));
                     $row2 = mysqli_fetch_assoc($resultPareigos);
                                              
				echo	'<h1>'.$row["name"].' '.$row["surname"].'</h1>';?>
				</div>




			</div>

			<div class="col-md-2">

				<p>
					<b>Position: </b> <br /> <?php echo $row2["name"];?>
				</p>
				<p>
					<b>Monthly Salary: </b> <br /><?php echo $row["salary"];?> EUR
				</p>

			</div>
            <div class="col-md-2">
				<p>
					<b>Education : </b> <br /> <?php echo $row["education"];?>
				</p>
			</div>
			<div class="col-md-2">
				<p>
					<b>Telephone: </b> <br /> <?php echo $row["phone"];?>
				</p>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-6">

				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading">Taxes</div>


					<table class="table  table-hover">

						<tr>
							<td>Calculated Salary Neto:</td>
							<td class="curr"><?php echo $row["salary"];?> EUR</td>


						</tr>
						<tr>
							<td>Adjusted amount of tax-exempt income:</td>
							<td class="curr"><?php echo $npd;?> EUR</td>


						</tr>
						<tr>
							<td>Tax rate 15 %</td>
							<td class="curr"><?php echo $taxRate=round(($row["salary"]-$npd)*.15,2);?> EUR</td>


						</tr>
						<tr>
							<td>Health insurance 6 %</td>
							<td class="curr"><?php echo $healthIns=round($row["salary"]*.06,2);?> EUR</td>


						</tr>
						<tr>
							<td>Pension fund and Social insurance 3 %</td>
							<td class="curr"><?php echo $socIns=round($row["salary"]*.06,2);?> EUR</td>


						</tr>

						<tr class="info">
							<td>Calculated Salary Bruto:</td>
							<td class="curr"><b><?php echo $row["salary"]-$healthIns-$socIns;?> EUR</b></td>
						</tr>

						<tr>
							<td colspan="2"><b>Price of Position</b></td>
						</tr>

						<tr>
							<td>Social insurance 30.98 %:</td>
							<td class="curr"><?php echo $sodra=round($row["salary"]*.3098,2);?> EUR</td>
						</tr>

						<tr>
							<td>Contribution to guarantee Fund 0.2 % :</td>
							<td class="curr"><?php echo $guarantee=round($row["salary"]*.002,2);?> EUR</td>

						</tr>
						<tr class="info">
							<td>Total price of Position :</td>
							<td class="curr"><b><?php echo $row["salary"]+$sodra+$guarantee;?> EUR</b></td>

						</tr>
					</table>
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
} else {
	echo '<script> location.href="darbuotojas_prisijungti.php"</script>';
	}
}

 ?>