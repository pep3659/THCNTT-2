<?php
$namehost = 'localhost';
	$userhost = 'pep3659';
	$passhost = 'cao123659258';
	$database = 'thcntt_project';

	// Lệnh kết nối tới database
	$DBC = mysqli_connect($namehost, $userhost, $passhost, $database);

	// Nếu kết nối database thất bạn sẽ báo lỗi
	if (!$DBC)
	{
		echo 'Could not connect to database.' . mysqli_connect_error();$namehost = 'localhost';
	$userhost = 'pep3659';
	$passhost = 'cao123659258';
	$database = 'test';

	// Lệnh kết nối tới database
	$DBC = mysqli_connect($namehost, $userhost, $passhost, $database);

	// Nếu kết nối database thất bạn sẽ báo lỗi
	if (!$DBC)
	{
		echo 'Could not connect to database.';
	}
		
	}
?>