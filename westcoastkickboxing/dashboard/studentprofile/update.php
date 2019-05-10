<?php
// Include config file
require_once "config.php";


 
 
// Define variables and initialize with empty values
$username = $surname = $email = $dob = $cell = $weight = $gender = $password = $userID = "";
$name_err = $surname_err = $email_err = $dob_err = $cell_err = $weight_err = $gender_err = $password_err = $userID_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["userID"]) && !empty($_POST["userID"])){
    // Get hidden input value
    $userID = $_POST["userID"];
    
    // Validate name
    $input_name = trim($_POST["username"]);
    if(empty($input_name)){
        $name_err = "Please enter your name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $username = $input_name;
    }
    
    // Validate address address
    $input_surname = trim($_POST["surname"]);
    if(empty($input_surname)){
        $surname_err = "Please enter your surname.";     
    } else{
        $surname = $input_surname;
    }
	
	    // Validate address address
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter your surname.";     
    } else{
        $email = $input_email;
    }
	
	    // Validate address address
    $input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please enter your surname.";     
    } else{
        $dob = $input_dob;
    }
	
	    // Validate address address
    $input_cell = trim($_POST["cell"]);
    if(empty($input_cell)){
        $cell_err = "Please enter your surname.";     
    } else{
        $cell = $input_cell;
    }
	
		    // Validate address address
    $input_weight = trim($_POST["weight"]);
    if(empty($input_weight)){
        $weight_err = "Please enter your surname.";     
    } else{
        $weight = $input_weight;
    }
		    // Validate address address
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please enter your surname.";     
    } else{
        $gender = $input_gender;
    }
		    // Validate address address
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter your surname.";     
    } else{
        $password = $input_password;
    }
    

    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($surname_err) && empty($email_err) && empty($dob_err) && empty($cell_err) && empty($weight_err) && empty($gender_err) && empty($password_err) && empty($userID_err)){
        // Prepare an update statement
        $sql = "UPDATE registration SET username=?, surname=?, email=?, dob=?, cell=?, weight=?, gender=?, password=?  WHERE userID=?";
        
		 
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_name, $param_surname, $param_email, $param_dob, $param_cell, $param_weight, $param_gender, $param_password, $param_userID);
            
            // Set parameters
            $param_name = $username;
            $param_surname = $surname;
            $param_email = $email;
            $param_dob = $dob;
			$param_cell = $cell;
			$param_weight = $weight;
			$param_gender = $gender;
			$param_password = $password;
			$param_userID = $userID;
			
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: studprofile.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM registration WHERE userID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
					 $userID = $row["userID"];
                    $username = $row["username"];
                    $surname = $row["surname"];
                    $email = $row["email"];
					$dob = $row["dob"];
					$cell = $row["cell"];
					$weight = $row["weight"];
					$gender = $row["gender"];
					 $password = $row["password"];
				
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
             .wrapper{
            width: 500px;
            margin: 0 auto;
			margin-top: 10px;
			margin-bottom: 10px;
			border: solid 3px black;
			background-color: #fefefe;
			height: 100%;
							border: 2px;
							border-radius: 15px;
							padding-bottom: 5px;
						
        }
    </style>
</head>
<body background="../../pictures/fancy_deboss.png"> 
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                       <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>ID Number</label>
                            <input type="text" name="userID" class="form-control" value="<?php echo $userID; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                           <label> Name </label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($surname_err)) ? 'has-error' : ''; ?>">
                            <label>Surname</label>
                            <input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>">
                            <span class="help-block"><?php echo $surname_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <label>DOB</label>
                            <input type="text" name="dob" class="form-control" value="<?php echo $dob; ?>">
                            <span class="help-block"><?php echo $dob_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($cell_err)) ? 'has-error' : ''; ?>">
                            <label>Cell</label>
                            <input type="text" name="cell" class="form-control" value="<?php echo $cell; ?>">
                            <span class="help-block"><?php echo $cell_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
                            <label>Weight</label>
                            <input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <input type="text" name="gender" class="form-control" value="<?php echo $gender; ?>">
                            <span class="help-block"><?php echo $gender_err;?></span>
                        </div>
                      	<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="studprofile.php" class="btn btn-default">Cancel</a>
						          
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>