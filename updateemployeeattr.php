<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Employee</title>
</head>

<body>
	<h2>Update an Employee Record</h2>
	<hr>
	<?php
		echo "<h3>PHP Code Generates This:</h3>";
		
		//some variables
		$servername = "localhost";  //mysql is on the same host as apache (not realistic) this would more likely be an IP address
		//$username = "<put your db username here>";    //username for database
	    $username = "foxsarh";
		//$password = "<put your db password here>";		//password for the user
	    $password = "123";
		$dbname = "employees";  	//which db you're going to use
	
		//this is the php object oriented style of creating a mysql connection
		$conn = new mysqli($servername, $username, $password, $dbname);  
	
		//check for connection success
		if ($conn->connect_error) {
			die("MySQL Connection Failed: " . $conn->connect_error);
		}
		echo "MySQL Connection Succeeded<br><br>";

        $emp_attr = $_GET["drop_down"];
        $new_value = $_GET["new_value"];
        $emp_no = $_GET["emp_no"];

        // display what we are updating to the user 
        echo "Updating: " . $emp_attr . " to " . $new_val;

        $sql = "UPDATE employees SET ".$emp_attr." = '".$new_val."' WHERE ".$emp_no." = '".$emp_no."'";
        //UPDATE employees SET hire_date = "1999-05-30" WHERE emp_no = 500000

        //run the Update
        if ($conn->query($sql) == TRUE){
			//print updated record
			
			echo "Employee Number: '".$emp_no."'  Updated Successfully<br>";
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}


        $conn->close();
	?>
</body>
</html>        