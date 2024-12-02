<?php

 // Database connection details 
 $host = '147.75.90.43'; 
 $user = 'devini'; 
 $password = 'Devini@99'; 
 $dbname = 'team_a'; 

 // Create connection 
 $conn = new mysqli($host, $user, $password, $dbname);

 // Check connection 
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error); 
 }
  echo "Connected successfully!"; 

 ?>