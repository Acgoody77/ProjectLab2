<!DOCTYPE html>
<html>

<head>
    <title>ProjectLab TTU</title>
</head>

<body>

<a href="35.164.7.13">Home</a>
<h1>NMEA GPS raw data</h1>

<?php

	/*echo readfile("rawdata.txt");
	echo "<br><br>";*/


	//input raw data from microcontroller
	$rawGPSdata = fopen("rawdata.txt", "r") or die("cant open file");
	$data = fread($rawGPSdata, filesize("rawdata.txt"));
	echo $data;

	//parse all of the data into usable chunks
	$parseGPS = explode("," , $data);

	fclose($rawGPSdata);


	echo "<br>";

	//show all the data after parsing
	for($x = 0; $x <= 14; $x++){
		echo $parseGPS[$x];
		echo "<br>";
	}

	echo "<br>";
	echo "<br>";

	$mov_lat = fopen("move_latitude.txt", "r") or die("cant open move_latitude.txt");
	$mov_lat_dat = fread($mov_lat, filesize("move_latitude.txt"));

	echo "Move to: ";
	echo $move_lat_dat;
	fclose($move_lat);

	echo "<br>";

	$mov_lng = fopen("move_longitude.txt", "r") or die("cant open move_longitude.txt");
	$mov_lng_dat = fread($mov_lat, filesize("move_longitude.txt"));

	echo "Move to: ";
	echo $move_lng_dat;
	fclose($move_lng);

	echo "<br>";



	//write the latitude to a file
	$latitude = fopen("parsedLocation.txt", "w") or die("cant open parsedLocation.txt");

	fwrite($latitude, $parseGPS[0]);

	fclose($latitude);


	//open the latitude file and read it
	$latitudeOpen = fopen("parsedLocation.txt", "r") or die("cant read parsedLocation.txt");

	echo fread($latitudeOpen, filesize("parsedLocation.txt"));

	fclose($latitudeOpen);



?>

</body>
</html>
