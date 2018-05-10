<?php
	
	session_start();

	$data = json_decode(file_get_contents("php://input"), true);
	$email = $data['email'];
	$password = $data['password'];

	$db_servername = "sql2.njit.edu";
	$db_username = "ag653";
	$db_password = "hXWvvL2xj";


	$dbh = mysql_connect ( $db_servername, $db_username, $db_password ) 
	        or die ( "Unable to connect to MySQL database" );
	mysql_select_db( $db_username ); 
	$q = "select  *from accounts where email ='$email'";
	$output_data = get_R($q);

	if(($password == $output_data['password']) && $output_data['email'] == $email && $output_data != 'false') {
		echo json_encode("success");
	}
	else
	{
		echo "Invalid credentials! Please try again";
	}



	function get_R($query)
	{
		$out = array();
		($t = mysql_query($query)) or die (mysql_error());
		if (mysql_num_rows($t)==0) 
		{
			return "false";
			die;
		}
		
		//$capture = mysql_num_rows($t);
		
		while ($r = mysql_fetch_array($t))
		{
			$email = $r["email"];
			$_SESSION['email_id'] = $email;
			$password = $r["password"];

			$out['email'] = $email;
			$out['password'] = $password;
			$fname = $r["fname"];
			$lname = $r["lname"];
			$out['fname'] = $fname;
			$out['lname'] = $lname;

			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;

		};
	return $out;
	}

?>


	