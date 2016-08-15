<?php

$servername = "localhost";
$username = "tester";
$password = "test123";

$monthtype = $_GET['monthtype'];


if ($monthtype != 'cur_month' && $monthtype != 'last_month' ) {
    $monthtype = 'cur_month';
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=testdb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("SELECT branch_name, $monthtype FROM sales");
    $stmt->execute();
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );
	echo json_encode( $result );
    //echo "Connected successfully"; 

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>