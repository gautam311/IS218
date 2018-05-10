<?php
	
	session_start();

	$data = json_decode(file_get_contents("php://input"), true);
	$email = $_SESSION['email_id'];

	$db_servername = "sql2.njit.edu";
	$db_username = "ag653";
	$db_password = "hXWvvL2xj";


	$dbh = mysql_connect ( $db_servername, $db_username, $db_password ) 
	        or die ( "Unable to connect to MySQL database" );
	mysql_select_db( $db_username ); 
	$q = "select *from accounts where email ='$email'";
	$output_data = get_R($q);
	echo json_encode($output_data);

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
			$fname = $r["fname"];
			$lname = $r["lname"];
			$_SESSION['email_id'] = $email;
			$_SESSION['fname'] = $email;
			$_SESSION['lname'] = $email;

			$out['email'] = $email;
			$out['fname'] = $fname;
			$out['lname'] = $lname;

		};
	return $out;
	}

?>
