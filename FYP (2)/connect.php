<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $id = $_POST['id'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    // Connection
    $conn = new mysqli('localhost', 'root', '', 'fyp');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    }

    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO register (fullname, id, number, password) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die('Prepare Failed : ' . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param('ssss', $fullname, $id, $number, $password);
    if (!$stmt->execute()) {
        die('Execute Failed : ' . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    // Display popup message and button to go to login page
    echo "<script>
            alert('Register successful');
            window.location.href = 'login.html';
          </script>";
}

?>