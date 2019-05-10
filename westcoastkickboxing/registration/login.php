<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/ihover.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


</head>
<body background="../pictures/fancy_deboss.png"> 
<div class="container-fluid">

			<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  
			  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				  <li class="nav-item ">
					<a class="nav-link" href="../index.html"><b>Home</b> </a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="../about.html"><b>About</b></a>
				  </li>
				    <li class="nav-item">
					<a class="nav-link" href="../contact.html"><b>Contact-Us</b></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="..\slidebox\galery.html"><b>Galery</b></a>
				  </li>
				    <li class="nav-item">
					<a class="nav-link" href="register.php"><b>Register</b></a>
				  </li>
				 
				</ul>
				
				<ul class="nav navbar-nav   navbar-right ">
					<li class="nav-item active"><a class="nav-link"  href="login.php"><i class="fas fa-sign-in-alt"></i> </span><b> Login</b><span class="sr-only">(current)</span></a></li>
				</ul>
			  
			  </div>
			</nav>

		  <div class="header bg-primary col-md-5 col-sm-12 col-xs-12">
			<h2>Login</h2>
		  </div>
			 
	<form method="post" action="login.php" class="col-md-5 col-sm-12 col-xs-12">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
		<div class="row">	
			<div class="input-group">
				<div class="col-md-6 col-sm-6 col-xs-6">
					<button type="submit" class="btn bg-primary floated text-light" name="login_user">Student Login</button>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">
					<button type="submit" class="btn bg-primary floated text-light" name="login_sensei">Sensei Login</button> 
				</div>
			</div>
			
		</div>
			<p>
				Not yet a member? <a href="register.php">Sign up</a>
			</p>
 </form>
 </div>
 
  
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>