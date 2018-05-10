<?php
	
session_start();
$email = $_SESSION['email_id'];

//$email = "janedoe@njit.edu";

$data = json_decode(file_get_contents("php://input"), true);
$front_id = $data['id'];
$edit_id = $data['edit_id'];
$edit_msg = $data['edit_msg'];
$add_item = $data['add'];
$add_date = $data['date'];
$checked = $data['checked_id'];

$datee = mysql_real_escape_string($add_date);
$datee = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $datee)));
//$datee = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $datee);

$date1 = strtr($add_date, '/', '-');
//echo $datee;


$edit_q = "update todos SET message='$edit_msg' where id='$edit_id'";
$delete_q = "delete from todos where id ='$front_id'";
$add_q = "insert into todos (owneremail, message, duedate) values ( '$email', '$add_item' , '$date1' )";
$checked_q = "update todos SET isdone =1 where id='$checked'";

$out = array();

$db_servername = "sql2.njit.edu";
$db_username = "ag653";
$db_password = "hXWvvL2xj";


$dbh = mysql_connect ( $db_servername, $db_username, $db_password ) 
        or die ( "Unable to connect to MySQL database" );
mysql_select_db( $db_username ); 
$q = "select *from todos where owneremail ='$email' and isdone=0 order by duedate";

delete_query($delete_q);
edit_query($edit_q);

if(!empty($checked)){edit_query($checked_q);}
if(!empty($add_item)){add_query($add_q);}

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
		$date = $r["duedate"];
		array_push($out, $id, $message, $date);

	};
return $out;
}

function delete_query($query_delete)
{
	($t = mysql_query($query_delete)) or die (mysql_error());
}


function edit_query($query_edit)
{
	($t = mysql_query($query_edit)) or die (mysql_error());
}

function add_query($query_add)
{
	($t = mysql_query($query_add)) or die (mysql_error());
}


?>