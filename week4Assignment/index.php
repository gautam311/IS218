<?php
	
	$date =  date('Y-m-d', time());
	echo "The value of \$date: ".$date."<br>";
	$tar = "2017/05/24";
	echo "The value of \$tar: ".$tar."<br>";
	$year = array("2012", "396", "300","2000", "1100", "1089");
	echo "The value of \$year: ";
	print_r($year);
	//Number 2
	$date = date('Y/m/d',time());
	echo "<br><br>(2) \$date with - replaced with: ".$date."<br>";
	//Number 3
	echo "<br>(3) \$date compared to $tar: ";
	if(strcmp($date,$tar) >0){
		echo " the future";
	}elseif (strcmp($date,$tar) <0){
		echo " the past";
	}elseif (strcmp($date,$tar) == 0){
		echo " Oops";
	}
	//Number 4
	echo "<br><br>(4) Search for '/' in \$date<br>";
	echo "First '/' occurance: ".strpos($date, "/")."<br>";
	echo "Second '/' occurance: ".strripos($date, "/")."<br>";
	//Number 5
	echo "<br>(5) Count the number of words in \$date:<br>";
	$newDate = explode('/',$date);
	echo "Number of words: ".count($newDate)."<br>";
	//Number 6
	echo "<br>(6) Return the length of a string<br>";
	echo "Length of \$date: ".strlen($date)."<br>";
	//Number 7
	echo "<br> (7) ASCII Value of first character of \$date string: ";
	$Newdate1 = ord(substr($date,0));
	echo $Newdate1."<br>";
	//Number 8
	echo "<br>(8) Print out last two characters in \$date<br>";
	echo "Last two characters: ".substr($date, 8)."<br>";
	//Number 9
	echo "<br>(9) Date Array:";
	echo " Array ([0] => $newDate[0] [1] => $newDate[1] [2] => $newDate[2])<br>";
	//Number 10
	echo "<br>(10) Leap Years<br>";
	foreach ($year as $y) {
		if ($y%4!= 0){
			echo $y.": False |";
		}elseif ($y%400 == 0){
			echo $y.": True |";
		}elseif($y%100 == 0){
			echo $y.": False |";
		}else{
			echo $y.": True |";
		}		
	}
	
?>