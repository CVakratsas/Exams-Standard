<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show All</title>
    <style>
        table, th, td {border: 1px solid black;}
    </style>
</head>
<body>

<h1>Βακρατσάς Κωνσταντίνος ics21088@uom.edu.gr</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ics21088";
$tablename = "ics21088";

// Check connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT t_name, email FROM $tablename";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Email</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["t_name"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "<br>";
?>

<a href="./index.php">Index</a>
<a href="./into.php">Into</a>

</body>
</html>