<?php

$signup_first_name = $_POST["signup-firstname"];

$signup_last_name = $_POST["signup-lastname"];

$signup_email = $_POST["signup-email"];

$signup_pass = $_POST["signup-password"];






$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "root"; 

$connect = mysql_connect($mysql_hostname, $mysql_username, $mysql_password) or die ("Could not connect to server");

print "<H2> Welcome to the New Orleans Office of Food Justice Webpage</H2>";


## Select Database ##

$mysql_database = "myapp";

mysql_select_db($mysql_database, $connect) or die ("Could not select database");

print "<H3> All future updates to programming will be directed to the email provided.</H3>";

### Insert DAta into Database

$insert_sql_query = "INSERT into users (signup_first_name, signup_last_name, signup_email, signup_pass) VALUES ('$signup_first_name','$signup_last_name', '$signup_email', '$signup_pass')";

print "<BR>";

### Run the Query ###

mysql_query($insert_sql_query);

 print '<br><br> <a href="home.html">Back to Home</a>';


?>