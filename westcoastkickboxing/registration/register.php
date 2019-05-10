<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/ihover.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	 
<style>

.navbar 	{font-size: 1.1em;
			letter-spacing: 0.1em;
			width: 100%;
			}
  
.carousel-inner{
  width:100%;
  max-height: 350px !important;
  }

.footnote p{
		font-size 1.1em;
		color: white;
		letter-spacing: 1px;
		text-align: center;
}


</style>
</head>

</head>
<body background="../pictures/fancy_deboss.png"> 


<div class="container-fluid">

			<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  

			  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				  <li class="nav-item">
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
				    <li class="nav-item active">
					<a class="nav-link" href="register.php"><b>Register</b><span class="sr-only">(current)</span></a>
				  </li>		 
				</ul>
				<ul class="nav navbar-nav   navbar-right ">
					<li class="nav-item"><a class="nav-link"  href="login.php"><i class="fas fa-sign-in-alt"></i> </span><b> Login</b></a></li>
				
				</ul>
			  
			  </div>
			</nav>
  <div class="header bg-primary col-md-5 col-sm-12 col-xs-12">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php" class="col-md-5 col-sm-12 col-xs-12">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
	
	<div class="input-group">
  	  <label>Surname</label>
  	  <input type="text" name="surname" value="<?php echo $surname; ?>">
  	</div>
	
	<div class="input-group">
  	  <label>ID number</label>
  	  <input type="text" name="userID" value="<?php echo $userID; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
	
	<div class="input-group">
  	  <label>Date Of Birth</label>
  	  <input type="text" name="dob" value="<?php echo $dob; ?>">
  	</div>
	
	<div class="input-group">
  	  <label>Cellphone Number</label>
  	  <input type="number" name="cell" value="<?php echo $cell; ?>">
  	</div>
	
	<div class="input-group">
  	  <label>Weight</label>
  	  <input type="text" name="weight" value="<?php echo $weight; ?>">
  	</div>
	
	<div class="input-group">
  	  <label>Gender</label>
  	  <input type="text" name="gender" value="<?php echo $gender; ?>">
  	</div>
	
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn bg-primary text-light" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>