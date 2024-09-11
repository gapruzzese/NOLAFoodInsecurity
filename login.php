<?php 


$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "root"; 

$connect = mysql_connect($mysql_hostname, $mysql_username, $mysql_password) or die ("Could not connect to server");

print "<H2> Welcome to the New Orleans Office of Food Justice Webpage</H2>";


$mysql_database = "myapp";

mysql_select_db($mysql_database, $connect) or die ("Could not select database");

print "<H3> All future updates to programming will be directed to the email provided.</H3>";


###  $sql_query_get_data = "SELECT signup_email, signup_pass from users";

### $users = mysql_query($sql_query_get_data);

### $email_login = array($users);

 $given_email = $_POST["email"];
 $given_pass = $_POST["password"]; 

// Perform the query

$admin_acct = ($given_email == "admin@nola.gov" && $given_pass == "admin");


# admin query 

if ($admin_acct){

$sql_query_allusers = "SELECT signup_email, signup_pass FROM users";

$allusers = mysql_query($sql_query_allusers);

if ($allusers){
	while($usertable = mysql_fetch_assoc($allusers)){

		print "Email: &nbsp;" . $usertable["signup_email"] . "<Br>" . "Password: &nbsp;" . $usertable["signup_pass"] . "<Br><Br>" ;
	}
}else {
        die("Error fetching users"  . mysql_error());
    }

 print '<br> <br> <a href="home.html">Back to Home</a>';

}else{
$sql_query_get_data = "SELECT signup_email, signup_pass FROM users WHERE signup_email = '$given_email'";

$userinput = mysql_query($sql_query_get_data);

if ($userinput) {
    if (mysql_num_rows($userinput) > 0) {
        $userdb = mysql_fetch_assoc($userinput);
        if ($userdb["signup_pass"] == $given_pass) {
            print "Welcome back $given_email";
        } else {
            print "Invalid Password";
        }
    } else {
        print "$given_email does not exist";
    }
} else {
    die("Error in SQL query");
}
 print '<br><br> <a href="home.html">Back to Home</a>';
}


?>