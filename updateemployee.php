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

        $emp_no = $_GET["emp_no"];

        echo "Searching for: " . $emp_no;
	
		echo "<br><br>";

        // grab the info from database so I can print the employee info to screen
        $sql = "SELECT * FROM employees where emp_no = '".$emp_no."'";
        $result = $conn->query($sql); // put SQL query results in a variable

        //if there were no records found say so, otherwise create a while loop that loops through all rows
		//and echos each line to the screen. You do this by creating some crazy looking echo statements
		// in the form of HTMLText . row[column] . HTMLText . row[column].   etc...
		// the dot "." is PHP's string concatenator operator
		if ($result->num_rows > 0){
			//print rows
			while($row = $result->fetch_assoc()){
				echo "Employee Detail: <br><br>" . $row["first_name"]. "<br>" . $row["last_name"]. "<br> " . $row["birth_date"]. "<br> " . $row["hire_date"]. "<br> " .$row["emp_no"]. "<br>";
			}
		} else {
			echo "No Records Found";
		}

        echo "<br><br>";
        //always close the DB connections, don't leave 'em hanging
		$conn->close();
		?>
 

        <!--create form here with the select drop-down w/ an ID and name-->
        <form action="updateemployeeattr.php">
            <label>Choose a field to update:</label><br>
            <select id="drop_down" name="drop_down">
                <option value="">Select...</option>
                <option value="gender">Gender</option>
                <option value="birth_date">Birth Date</option>
                <option value="hire_date">Hire Date</option>
                <option value="first_name">First Name</option>
                <option value="last_name">Last Name</option>
            </select>

        <!--then input box for new value and employee number--> 
            <br><br>
            New Value:<br>
            <input type="text" name="new_value" value="">
            <br><br>
            Employee Number:<br>
            <input type="text" name="emp_no" value="500000">
            <br><br>
            <input type="submit" value="Submit">
        </form>

		
		<!--//pull the attribute that was passed with the html form GET request and put into a local variable.
		$lastname = $_GET["lastname"];
		$firstname = $_GET["firstname"];
		$birthdate = $_GET["birth_date"];
		$hiredate = $_GET["hire_date"];
		$gender = $_GET["gender"];
		$emp_no = $_GET["emp_no"];-->
		
       
	
</body>
</html>
