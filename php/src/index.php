<?php
#Connects us to the database and checks if system is on
#Else gives us an error message that the database is not working.
include("database_connection.php");

#Checks if request method is using post.
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	#We take the post values from the HTML 'employee' and assign a variable to it.
	#The selected are already set and inserted in the employees table for our database.
	$selected_employee = mysqli_real_escape_string($conn,$_POST['employee']);
	
	#We create a query that displays data of said employee.
	
	$query ="SELECT * FROM `employees` WHERE first_name= '$selected_employee'";
	$run_query = mysqli_query($conn, $query);
	

}
?>

<!DOCTYPE html>
<html lang="en">
<title>Login Page</title>
<meta charset ="UTF-8"
<meta name="viewport" content="initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">

<body class="w3-theme-d4" style="font-family: sans-serif;">


<div class ="w3-card-4" style="margin:auto;width:25%">
	<p>
	<div class ="w3-container w3-card-4 w3-theme-d1">
		<h2>Employee Data</h2>
	</div>
	<form action ="" method = "post" class="w3-container w3-card-4 w3-white">
		<p>
		<select class="w3-select" name="employee">
			<option value="" selected disabled>Select An Employee</option>
			<option value="Bob" selected>Bob</option>
			<option value="Sonny">Sonny</option>
			<option value="Gary">Gary</option>
			<option value="Ben">Ben</option>
			<option value="Jen">Jen</option>
			<option value="Li">Li</option>
			<option value="Kaz">Kaz</option>
			<option value="Mark">Mark</option>
			<option value="Caroline">Caroline</option>
			<option value="John">John</option>
			<option value="Henry">Henry</option>
			<option value="Albert">Albert</option>
			<option value="Mari">Mari</option>
			
		</select>
		<p>
	<button type="submit" formmethod="post" class="w3-btn w3-theme-d1">Select</button>
	
	</form>
</div>
</body>
</html>


<p>
<table class="w3-table-all w3-card-4 w3-text-black">

<thead>
<tr class ="w3-theme-d2">
<th>ID</th>
<th>First Name</th>
<th>Position</th>
<th>Manager ID</th>
<th>Department</th>
</tr>

</thead>
<?php
//We print out the contents of the row in table `employees` containing the first_name of the selected employee.
//First time use may contain errors. Refresh to resolve.
$employee_data = mysqli_fetch_array($run_query);

echo "<tr>";
echo "<td>". "<b>". $employee_data['employee_id']. "</b>". "</td>";
echo "<td>". $employee_data['first_name']. "</td>";
echo "<td>". $employee_data['position']. "</td>";
echo "<td>". $employee_data['managers_id']. "</td>";
echo "<td>". $employee_data['department']. "</td>";
echo "</tr>";

?>
</table>