<?php 
	session_start();
?>

<?php
	if(isset($_SESSION['username'])){

		header('location : login.php');
	}
	require_once("global_database_function.php");
?>


<html>
<head>
	<title>Books For Life</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/style.css" rel="stylesheet" media="screen">
</head>

<body>
	<div class="container">
		<div class="row clearfix">
			
			<div class="col-md-12">
				<header>
					<div class="row">
						<div class="col-md-12">
							<h1><b>Books For Life</b></h1>
							<h4>Buy it, Sell it, Love it</h4>
						</div>
					</div>
				</header>
				<hr>
			</div>

			<aside> 
			<div class="row clearfix">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<?php
								if(empty((@$_SESSION['username'] ))){
									echo '
										<div class="list-group">
											<a href="#" class="list-group-item active">User Login</a>
											<div class="list-group-item">
												<form role="login" action = "login.php" method = "POST">
													<div class="form-group">
														<input type = "email" class="form-control" name = "email" placeholder = "Email" size="40"> 
													</div>
													<div class="form-group">
														<input type = "password" class="form-control" name = "password" placeholder = "Password " size="40"> 
													</div>
													<td> <input type = "submit" name = "Login" value="Login" class="btn btn-default"> </td>
												</form>
											</div>
								
											<div class="list-group">
												<a href="loginbaru.php" class="list-group-item active">Create an Account</a>
											</div>
										</div>
									';
								}
							?>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
			</aside>

			<footer>
				<div class="col-md-12">
					<br /><br /><br /><br /><br />
					<div class="col-md-4"></div>
					<div class="col-md-6"></div>
					<div class="col-md-2"><a href="index.php" class="btn" type="button">Back To Home</a></div>
					<hr><hr>
					<p align="center">Ilmu Komputer/ Informatika 2016</p>
				</div>
			</footer>

		</div>
	</div>

</body>
</html>