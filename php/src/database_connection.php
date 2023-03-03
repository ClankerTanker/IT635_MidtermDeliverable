<?php
#Connects us to the database, if we are unable to do so it ends the attempt and provides a message that
	#we were unable to do so.
$conn = new mysqli("db", "user", "password","company_info");
	if(! $conn){
		die("Unable to connect to database!".mysql_error());
	}

?>