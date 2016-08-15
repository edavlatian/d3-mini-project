<?php

$servername = "localhost";
$username = "tester";
$password = "test123";

$yeartype = $_GET['yeartype'];


if ($yeartype != 'cur_fiscal_year' && $yeartype != 'last_fiscal_year' ) {
    $yeartype = 'cur_fiscal_year';
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=testdb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt=$conn->prepare("SELECT branch_name, $yeartype FROM sales");
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