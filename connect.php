<?php 
		$server="localhost";
		$user="root";
		$password="";
		$database="access_system";
		$con=mysqli_connect($server,$user,$password,$database);
		if(!$con)
		echo 'Connection failed !';
		?>