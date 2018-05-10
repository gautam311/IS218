<?php
	
session_start();
$email = $_SESSION['email_id'];

$data = json_decode(file_get_contents("php://input"), true);
$front_id = $data['id'];

$out = array();

$db_servername = "sql2.njit.edu";
$db_username = "ag653";
$db_password = "hXWvvL2xj";


$dbh = mysql_connect ( $db_servername, $db_username, $db_password ) 
        or die ( "Unable to connect to MySQL database" );
mysql_select_db( $db_username ); 
$q = "select *from todos where owneremail ='$email' and isdone=1 order by duedate";



$output = get_R($q);
echo json_encode($output);



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
		$email = $r["owneremail"];
		$id = $r["id"];
		$message = $r["message"];


		array_push($out, $id, $message);

	};
return $out;
}