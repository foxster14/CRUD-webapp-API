<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Find Employee</title>
</head>

<body>
	<h2>Find an Employee Record</h2>
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
		
		//pull the attribute that was passed with the html form GET request and put into a local variable.
		$lastname = $_GET["lastname"];
		echo "Searching for: " . $lastname;
	
		echo "<br><br>";
		
		//create the SQL select statement, notice the funky string concat at the end to variablize the query
		//based on using the GET attribute
		$sql = "SELECT first_name,last_name FROM employees where last_name = '".$lastname."'";
	
		//put the resultset into a variable, again object oriented way of doing things here
		$result = $conn->query($sql);
	
		//if there were no records found say so, otherwise create a while loop that loops through all rows
		//and echos each line to the screen. You do this by creating some crazy looking echo statements
		// in the form of HTMLText . row[column] . HTMLText . row[column].   etc...
		// the dot "." is PHP's string concatenator operator
		if ($result->num_rows > 0){
			//print rows
			while($row = $result->fetch_assoc()){
				echo "Employee: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
			}
		} else {
			echo "No Records Found";
		}
		
		//always close the DB connections, don't leave 'em hanging
		$conn->close();
		
	?>
</body>
</html>
