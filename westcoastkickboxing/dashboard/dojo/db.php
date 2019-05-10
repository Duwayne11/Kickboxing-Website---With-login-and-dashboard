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
					<li class="nav-item"><a class="nav-link"  href="senseiDashboard.php?logout='1'"><i class="fas fa-sign-in-alt"></i> </span><b> Logout</b></a></li>
				
				</ul>
				
			  

			</nav>

	<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">

					  <div class="header bg-primary col-md-12 col-sm-12 col-xs-12">
						<h3>My West Coast Kick-Boxing</h3>
					  </div>
						
					  <form method="post"  class="col-md-12 col-sm-12 col-xs-12">
							<?php include('errors.php'); ?>
							<div class="input-group">
							  <label>Gym name</label>
							  <input type="text" name="dojoName" value="<?php echo $dojoName; ?>">
							</div>
							
							<div class="input-group">
							  <label>Address</label>
							  <input type="text" name="dojoAddress" value="<?php echo $dojoAddress; ?>">
							</div>
							
							<div class="input-group">
							  <label>Sensei Name</label>
							  <input type="text" name="senseiName" value="<?php echo $senseiName; ?>">
							</div>
						

							<div class="input-group">
							  <label>Number of Students</label>
							  <input type="text" name="numberStudents" value="<?php echo $numberStudents; ?>">
							</div>	
							

							<div class="input-group">
							  <button type="submit" class="btn bg-primary text-light floated" name="addGym">Add  Gym</button>
						
							  <button type="submit" class="btn bg-primary text-light floated" name="clear">Clear Form</button>
							  
							  <?php
										if (isset($_POST['clear'])) {
											$dojoName = "";
											$dojoAddress = "";
										//	$senseiName = "";
											$numberStudents = "";
										}
							  ?>
							  
							  
							</div>
							<p>
								Back to Dashboard? <a href="senseiDashboard.php">My Dashboard</a>
							</p>
					  </form>
			</div>
					  
			<div class="col-md-6 col-sm-12 col-xs-12">								<!--parent CONTAINER-->
				
				  <div class="header bg-primary col-md-12 col-sm-12 col-xs-12"> 		<!--parent child-->
						<h3>My West Coast Kick-Boxing</h3>
				  </div>
				  
				
					<table class="col-md-12 col-sm-12 col-xs-12">  
							<tr>  
								<th>Number</th>  
								<th>Gym Name</th>  
								<th>Address</th>
								<th>Sensei Name</th>
								<th>students</th>
								<th>Remove</th>
							
							</tr>  
							<?php  
							$mysqli = mysqli_connect('localhost', 'root', '','westcoast'); 
							
									if(isset($_POST['btnRemove'])){

									$addRemark = mysqli_query($mysqli,"DELETE FROM dojo WHERE dojoID='$_POST[hidden]'");


																	};
							
				    
				  
					  
					$sql = mysqli_query($mysqli,"SELECT `dojoID`,`dojoName`,`dojoAddress`,`senseiName`,`numberStudents` FROM `dojo`");  
					  
					  
					while($data = mysqli_fetch_row($sql)){  
					  
			echo		"<tr>"  ;
			echo		"<td>" .  $data[0] . "</td>"  ;
			echo		"<td>" . $data[1] . "</td> " ;
			echo		"<td>" . $data[2] . "</td>  ";
			echo		"<td>" . $data[3] . "</td> " ;
			echo		"<td>" . $data[4] . "</td>" ;
			echo 	"<td>" . "<input type='hidden' name=hidden value=" 					.  $data['dojoID']				. 		"</td>";
			echo		 "<td><button class='delete' name='btnRemove' id='btnRemove' >Delete</button></td>";
					
			echo		"</tr>"; 
					
						
					}  
						
						
					?>  
						</table> 
			
				</div>
			
			</div>
					  
		</div>	
		

</div>	



	
  		<?php

//load.php


$mysqli = mysqli_connect('localhost', 'root', '','westcoast');


if(isset($_POST['delete'])){
	
 
   $addRemark = mysqli_query($mysqli,"DELETE FROM dojo WHERE dojoID='$_POST[hidden]'");


	};


 

$sql = "SELECT * FROM dojo";
$myData = mysqli_query($mysqli, $sql);

echo "<table border=1>
								<th>Number</th>  
								<th>Gym Name</th>  
								<th>Address</th>
								<th>Sensei Name</th>
								<th>students</th>
								<th>Remove</th>";
while($record = mysqli_fetch_array($myData)){
	echo "<form action=dojo.php method=post >";
	echo "<tr>";
	echo "<td>" . $record['dojoID'] . "</td>";
	echo "<td>" . $record['dojoName'] . "</td>";
	echo "<td>" . $record['dojoAddress'] . "</td>";
	echo "<td>" . $record['senseiName'] . "</td>";
	echo "<td>" . $record['numberStudents'] . "</td>";
	echo "<td>" . "<input type='hidden' name=hidden value=" 					.  $record['dojoID']				. 		"</td>";
	///echo "<td>" . "<input type='submit' name='delete' value='Remark/Comment' class=btn>"											.		"</td>";
	echo		 "<td><button class='delete' name='delete' id='delete' >Delete</button></td>";
	echo "</form>";
	}

echo "</table>"; 
mysqli_close($mysqli);




?>

  
  
  
  
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>