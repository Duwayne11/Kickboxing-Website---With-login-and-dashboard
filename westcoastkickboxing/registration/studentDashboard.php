<?php include('../registration/server.php') ?>

<?php 
  //session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width = device-width, initial-scale = 1">

<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./css/ihover.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
	
	
	
.navbar 	{font-size: 1.1em;
			letter-spacing: 0.1em;
			width: 100%;
			}
	
			
  


.footnote p{
		font-size 1.1em;
		color: white;
		letter-spacing: 1px;
		text-align: center;
}

.btn-width{
				width: 100%;
				height: 150px;
}
.btn-width2{
				width: 50%;
				height: 150px;
}

.btn-width3{
				background-color : Yellow;
				color: white;
}



/* Full-width input fields */
	input[type=text], input[type=password] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}

/* Set a style for all buttons */
	.popupBtn {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
	font-size:20px;
}
.popupBtn:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 200px;
	height:200px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

.stud-message-updates{		height: 100%;
							border: 2px;
							border-radius: 5px;
							padding-left: 9px;
							padding-top: 9px;
	}
.notification-head{
							padding-right: 15px;
	
}	

</style>

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
				
			  
			  </div>
			</nav>
		
	<br>
		<br>
	<!-- The Buttons that are displayed on the dashboard -->
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<a href="..\calendar\studentcalendar.php">	<button type="button" class="btn btn-primary btn-width bg-primary"><b>My Calendar</b> <br>_____________________________</br><i class="fas fa-calendar-alt fa-5x"></i></button> </a>
					<a href="..\dashboard\studentprofile\studprofile.php" class="text-light"><button type="button" class="btn btn-secondary bg-secondary btn-width2 text-light"><b>My Profile</b> <br>__________________</br><i class="fas fa-users fa-3x"></i> </button></a>
					<a href="..\dashboard\dojo\studentdojo.php"><button type="button" class="btn btn-success bg-success btn-width2 text-light bg-warning float-left"><b>My Dojo</b> <br> __________________ </br><i class="fas fa-warehouse fa-3x"></i></button></a>
					
				</div>
				
				<div class="col-md-6 col-sm-12 col-xs-12">
<!--Notification ICON AND HEAD section-->
					<div class="stud-message-updates bg-primary ">
							<ul class="nav navbar-nav   navbar-right ">
								<li class="nav-item"><i class="far fa-bell fa-2x text-light"></i> </span><h3 class="float-left notification-head text-light"> Notification</h3></li>
							</ul>
							<br>
								
						<?php
						
							//load.php
								$mysqli = mysqli_connect('localhost', 'root', '','westcoast');		//Connection String 
								
								$sql = "SELECT * FROM notification";						//Populate the table
								$myData = mysqli_query($mysqli, $sql);

								echo "<table class='col-md-12 col-sm-12 col-xs-12'>
																
																<th>Date</th>  
																<th>Sensei</th>
																<th>Notification</th>

																";
								while($record = mysqli_fetch_array($myData)){
									echo "<form action=studentDashboard.php method=post >";
									echo "<tr>";
									echo "<td>" . $record['pubDate'] . "</td>";
									echo "<td>" . $record['senseiName'] . "</td>";
									echo "<td>" . $record['message'] . "</td>";
									//echo "<td>" . "<input type='hidden' name=hidden value="	.  $record['notificationNumber']	. 	"</td>";
									echo "</form>";
									}
								echo "</table>"; 
								mysqli_close($mysqli);

								?>
					</div>
				</div>
			</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>