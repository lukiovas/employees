<?php session_start();
 if (isset($_SESSION)) {
if ( $_SESSION['valid'] == true) {
	
 ?>
<?php 
if (isset($_GET)) {
	$db = mysqli_connect('localhost', 'root', '', 'naujas_localhost');
	mysqli_query($db, 'DELETE  FROM employees WHERE id='.$_GET["id"]) or die (mysqli_error($db));
}
 ?>

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
 
td {
	vertical-align: middle !important;
}
div {
	   text-align: center;
    display: block;
    margin: 0 auto;
}
</style>

</head>
<div> <h2 class="panel-heading">Employee deleted.</h2>
<a href="darbuotojai_pareigos.php" class="btn btn-primary">Back</a></div>
 <?php 
} else {
	echo '<script> location.href="darbuotojas_prisijungti.php"</script>';
	}
}

 ?>