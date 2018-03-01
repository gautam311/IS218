<?php
	$username = 'ag653';
	$password = 'hXWvvL2xj';
	$hostname = 'sql2.njit.edu';

	$dsn = "mysql:host=$hostname;dbname=$username";

	try{
		$db = new PDO($dsn,$username,$password);
		echo "Connected Successfully<br>";
	} catch(PDOException $error){
		echo '<h3> Error </h3>';
		echo $error->getMessage();
		exit();
	} catch(Exception $error){
		echo '<h3>Generic</h3>';
		echo $error->getMessage();
		exit();
	}

	$query = 'SELECT * FROM accounts WHERE  id < :id';
	$statement = $db->prepare($query);
	$statement->bindValue(':id',6);
	$statement->execute();
	$todos = $statement->fetchAll();
	$statement->closeCursor();

	$query = 'SELECT COUNT(*) FROM accounts WHERE  id < :id';
	$statement = $db->prepare($query);
	$statement->bindValue(':id',6);
	$statement->execute();
	$count = $statement->fetchAll();
	$statement->closeCursor();
	echo "Nuumber of records: ";
	print_r($count[0]);
	#print_r($todos);
?>

<table style="width:100%">
	<tr>
		<th> ID </th>
		<th> Email </th>
		<th> First Name </th>
		<th> Last Name </th>
		<th> Phone </th>
		<th> Birthday </th>
		<th> Gender </th>
		<th> Password </th>
	</tr>
	<?php foreach ($todos as $todo):?>
	<tr>
		<td align ="center">

			<?php echo $todo['id'];?>
			
		</td>
		<td align ="center">
			<?php echo $todo['email'];?>
			
		</td>
		<td align ="center">
			<?php echo $todo['fname'];?>
			
		</td>
		<td align ="center">
			<?php echo $todo['lname'];?>
			
		</td>
		<td align ="center">
			<?php echo $todo['phone'];?>
			
		</td>
		<td align ="center">
			<?php echo $todo['birthday'];?>
			
		</td>
		<td align ="center">
			<?php echo $todo['gender'];?>
			
		</td>
		<td align ="center">
			<?php echo $todo['password'];?>
			
		</td>
	</tr>
	
	<?php endforeach;?>

</table>