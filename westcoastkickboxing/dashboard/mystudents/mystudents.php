<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>West-Coast Kick-Boxing </title>
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



table{		margin-bottom: 35px;
			
			//margin-left: 2%;
			//border-collapse: collapse;
			
		}
		
		table, th, td {
				border: 2px solid grey;
}

		table th {
			padding: 10px;
		}
		
			table td {
			padding: 5px;
			padding-left: 11px;
			padding-right: 11px;
			
		}


		
		tr:hover {background-color: lightgrey;}
		tr:nth-child(even) {background-color:#99d6ff;}


</style>
</head>

</head>
<body background="../pictures/fancy_deboss.png"> 


<div class="container-fluid">

			<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top pull-right">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  

			 <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0 " >
				  
				    <!-- logged in user information -->
						<?php  if (isset($_SESSION['username'])) : ?>
						
						<li class="nav-item"><a class="nav-link">Welcome <strong><?php echo $_SESSION['username']; ?></strong></a></li>
					   
						<?php endif ?>
		
				</ul>
				
				
				
				<ul class="nav navbar-nav   navbar-right ">
					<li class="nav-item"><a class="nav-link"  href="../../registration/senseiDashboard.php?logout='1'"><i class="fas fa-sign-in-alt"></i> </span><b> Logout</b></a></li>
				
				</ul>
				
			  

			</nav>
			 
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">								<!--parent CONTAINER-->
				<div class="header bg-primary col-md-12 col-sm-12 col-xs-12"> 		<!--parent child-->
					
					<h3>My Students</h3>
				 </div>
		<div class="table-responsive">		 
			<table class="table">  
						<tr>  
							<th>Name</th>  
							<th>Surname</th>  
							<th>Gender</th>
							<th>DOB</th>
							<th>Weight</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Password</th>
						</tr>  
				<?php  
						$sql = mysqli_query($db,"SELECT `username`,`surname`,`gender`,`dob`,`weight`,`email`,`cell`,`password` FROM `registration`");  

						while($data = mysqli_fetch_row($sql)){  
						echo '  
						<tr>  
						<td>'.$data[0].'</td>  
						<td>'.$data[1].'</td>  
						<td>'.$data[2].'</td>  
						<td>'.$data[3].'</td>  
						<td>'.$data[4].'</td>  
						<td>'.$data[5].'</td>  
						<td>'.$data[6].'</td>  
						<td>'.$data[7].'</td>
						</tr>  
						';  
						}  
				?>  
			</table> 
		</div>	
		</div>
</div>	
	<ul class="nav navbar-nav">
		<li class="nav-item"><a class="nav-link"  href="../../registration/senseiDashboard.php"><i class="fas fa-arrow-left"></i></span><b> Dashboard</b></a></li>
			
	</ul>


	
  		

  
  
  
  
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>