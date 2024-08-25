<?php
$servername = "server1.komputasi.org";
$username = "komputas_irigasisawahpadi";
$password = "kaLjmAWflX";
$dbname = "komputas_irigasisawahpadi";

/*$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);*/

$suhu = $keruh = $ph = $tds = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suhu = test_input($_POST["suhu"]);
    $keruh = test_input($_POST["keruh"]);
    $ph = test_input($_POST["ph"]);
    $tds = test_input($_POST["tds"]);
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "INSERT INTO sensordata (suhu, keruh, ph, tds)
    VALUES ('" . $suhu . "', '" . $keruh . "', '" . $ph . "', '" . $tds . "')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
