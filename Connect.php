<?php
//Create The Connection
$serverName="localhost";
$serverPassword="";
$server_username= "root";
$Database_name="forms";
$datab = new mysqli("localhost","root","","forms");
//Check connection

if ($datab->connect_error) {
    die("Connection failed: " . $datab->connect_error);
}
	   
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment = $_POST["enrollment_number"];
    $name = $_POST["name"];
    $birthDate = $_POST["birth_date"];
    $contact = $_POST["contact_number"];
    $email = $_POST["email"];

 // Validate email format
 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address!";
    } else {
        // Validate unique enrollment number
        $checkQuery = "SELECT * FROM data WHERE enrollment_number= ?";
        $stmt = $datab->prepare($checkQuery);
        $stmt->bind_param("i", $enrollment);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Enrollment number already exists!";
        } else {
            // Insert data into the database
            $insertQuery = "INSERT INTO data(enrollment_number, name, birth_date, contact_number, email) VALUES (?, ?, ?, ?, ?)";
            $stmt = $datab->prepare($insertQuery);
            $stmt->bind_param("issss", $enrollment, $name, $birthDate, $contact, $email);

            if ($stmt->execute()) {
                echo "Data inserted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    
}
 }
	

$datab->close();
 ?>
	
	