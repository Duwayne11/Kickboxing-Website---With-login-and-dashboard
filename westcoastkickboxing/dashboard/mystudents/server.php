<?php
session_start();

// initializing variables
$username = "";
$surname = "";
$userID ="";
$email    = "";
$dob = "";
$cell = "";
$weight = "";
$gender = "";
$sensei ="";
$message ="";
$dojoName = "";
$dojoAddress = "";
$senseiName = "";
$numberStudents = "";

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'westcoast');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $surname = mysqli_real_escape_string($db, $_POST['surname']);
  $userID = mysqli_real_escape_string($db, $_POST['userID']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $cell = mysqli_real_escape_string($db, $_POST['cell']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $sensei = mysqli_real_escape_string($db, $_POST['sensei']);
  $message = mysqli_real_escape_string($db, $_POST['message']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($surname)) { array_push($errors, "Surname is required"); }
  if (empty($userID)) { array_push($errors, "ID number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($dob)) { array_push($errors, "Birthdate is required"); }
  if (empty($cell)) { array_push($errors, "Cellphone number is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($sensei)) { array_push($errors, "Gender is required"); }
  if (empty($message)) { array_push($errors, "Gender is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registration WHERE userID='$userID' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = ($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO registration (userID, username, surname, email, dob, cell, weight, gender, password) 
  			  VALUES('$userID', '$username', '$surname', '$email', '$dob', '$cell', '$weight', '$gender','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: studentDashboard.php');
  }
}
// ... 

// LOGIN Student
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = ($password);
  	$query = "SELECT * FROM registration WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
	  header('location: studentDashboard.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

// LOGIN SENSEI 
if (isset($_POST['login_sensei'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = ($password);
  	$query = "SELECT * FROM sensei WHERE senseiName='$username' AND senseiPassword='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
	  header('location: senseiDashboard.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//Sensei Notification
// LOGIN SENSEI 
if (isset($_POST['btnMessage'])) {
  $sensei = mysqli_real_escape_string($db, $_POST['senseiName']);
  $message = mysqli_real_escape_string($db, $_POST['message']);
  // Finally, register user if there are no errors in the form

  	$query2 = "INSERT INTO notification (senseiName, message) VALUES('$sensei', '$message')";
  	mysqli_query($db, $query2);

  
}



//Add New West Coast Gym

if (isset($_POST['addGym'])) {
  $dojoName = mysqli_real_escape_string($db, $_POST['dojoName']);
  $dojoAddress = mysqli_real_escape_string($db, $_POST['dojoAddress']);
  $senseiName = mysqli_real_escape_string($db, $_POST['senseiName']);
  $numberStudents = mysqli_real_escape_string($db, $_POST['numberStudents']);
  // Finally, register user if there are no errors in the form

  	$query2 = "INSERT INTO dojo (dojoName, dojoAddress, senseiName, numberStudents) VALUES('$dojoName', '$dojoAddress', '$senseiName', '$numberStudents')";
  	mysqli_query($db, $query2);

  
}

?>