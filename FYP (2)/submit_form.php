<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$placename = $_POST['placename'];
    $fee = $_POST['fee'];
    $distric = $_POST['distric'];
    $description = $_POST['description'];
    $contact = $_POST['contact'];
    $numbeds = $_POST['numbeds'];
    $numbathrooms = $_POST['numbathrooms'];
	
	$conn = new mysqli('localhost', 'root', '', 'fyp');
	if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    }	
	// Handle file uploads
$uploadDir = 'uploads/';
$placeimage1 = $uploadDir . basename($_FILES['placeimage1']['name']);
$placeimage2 = $uploadDir . basename($_FILES['placeimage2']['name']);
$placeimage3 = $uploadDir . basename($_FILES['placeimage3']['name']);
$thumbnail = $uploadDir . basename($_FILES['thumbnail']['name']);

        $file_name4 = $_FILES['thumbnail']['name'];
        $tempname4 = $_FILES['thumbnail']['tmp_name'];
        $folder4 = 'Images/'.$file_name4;

// Move uploaded files to the upload directory
move_uploaded_file($_FILES['placeimage1']['tmp_name'], $placeimage1);
move_uploaded_file($_FILES['placeimage2']['tmp_name'], $placeimage2);
move_uploaded_file($_FILES['placeimage3']['tmp_name'], $placeimage3);
move_uploaded_file($tempname4,$folder4);
	

	$stmt = $conn->prepare("INSERT INTO room (placename, fee, distric, description, contact, numbeds, numbathrooms, placeimage1, placeimage2, placeimage3, thumbnail) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$requiredFields = ['field1', 'field2', 'field3'];
	
    // Check if all required fields are present in $_POST and $_FILES
     if (!$stmt) {
        die('Prepare Failed : ' . $conn->error);
    }
		
		 $stmt->bind_param("sssssiissss", $placename, $fee, $distric, $description, $contact, $numbeds, $numbathrooms, $placeimage1, $placeimage2, $placeimage3,  $file_name4); 
	
		;

        // Execute the statement
        if (!$stmt->execute()) {
        die('Execute Failed : ' . $stmt->error);
    }
        // Close connection
        $stmt->close();
        $conn->close();
		
       echo "<script>
            alert('Register successful');
            window.location.href = 'postry.php';
          </script>";
	}
?>