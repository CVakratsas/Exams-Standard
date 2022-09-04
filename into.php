<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Into</title>
    <style>.error {color: #FF0000;}</style>
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
$t_name = $email = ""; 
$flag = true;

// Connect to database
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['t_name'])){
        $nameErr = "Name is required";
        $flag = false;
    }
    else {
        $t_name = test_input($_POST['t_name']);
        // Name validation
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            $flag = false;
        }
    }

    if (empty($_POST['email'])){
        $emailErr = "Email is required";
        $flag = false;
    }
    else {
        $email = test_input($_POST['email']);
        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
            $flag = false;
        }
    }
    
    # In case URL validation is expected
    // if (empty($_POST["website"])) {
    //     $website = ""; // Not necessary
    //     } else {
    //     $website = test_input($_POST["website"]);
    //     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    //     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
    //         $websiteErr = "Invalid URL"; 
    //     }
    // }

    if ($flag){
        $sql = "INSERT INTO $tablename(t_name, email)
        VALUES ('$t_name', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // # In case multiple of insertions
    // // Prepare and bind
    // $stmt = $conn->prepare("INSERT INTO $tablename (t_name, email)
    // VALUES (?, ?)");
    // $stmt->bind_param("sss", $t_name, $email);

    // // Set parameters and execute
    // $firstname = "John";
    // $lastname = "Doe";
    // $email = "john@example.com";
    // $stmt->execute(); 

    // $firstname = "Julie";
    // $lastname = "Dooley";
    // $email = "julie@example.com";
    // $stmt->execute();

    // $stmt->close(); 

}

   function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>

<p><span class="error">* required field.</span></p>
<form method='POST' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    Name <input type="text" id="t_name" name="t_name" style="width: 400px"> <span class='error'>* <?php echo $nameErr;?> </span> 
    <br> <br>
    Email <input type="text" id="email" name="email" style="width: 200px"> <span class='error'>* <?php echo $emailErr;?> </span> 
    <br> <br>
    <br>
    <button type="reset"> Καθάρισμα </button>
    <input type="submit" value="Υποβολή"/>
    <br>
</form>

<a href="./showall.php">Show All</a>
<a href="./index.php">Index</a>

</body>
</html>