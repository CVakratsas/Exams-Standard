<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
<h1>Βακρατσάς Κωνσταντίνος ics21088@uom.edu.gr</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ics21088";
$tablename = "ics21088";

// define variables and set to empty values
$nameErr = $emailErr = "";
$P_name = $email = ""; 
$flag = true;

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{echo "Connected successfully <br>";}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists <br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Check connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
}

// Create table
$sql = "CREATE TABLE IF NOT EXISTS $tablename(
    t_name VARCHAR(30) PRIMARY KEY,
    email VARCHAR(50) NOT NULL
)";
    
if ($conn->query($sql) === TRUE) {
    echo "Table $tablename created successfully or already exists <br>";
} else {
    echo "Error creating table: " . $conn->error;
}
?>

<a href="./showall.php">Show All</a>
<a href="./into.php">Into</a>

</body>
</html>