<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values from the form
    $id = $_POST['id'];
    $password = $_POST['password'];

    // Connection to the database
    $conn = new mysqli('localhost', 'root', '', 'fyp');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM register WHERE id = ?");
    if (!$stmt) {
        die('Prepare Failed : ' . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param('s', $id);
    if (!$stmt->execute()) {
        die('Execute Failed : ' . $stmt->error);
    }

    // Get the result of the query
    $result = $stmt->get_result();

    // Check if a user with the provided ID exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the password (without hashing)
        if ($password === $row['password']) {
            // Password is correct
            session_start();
            $_SESSION['id'] = $row['id']; // Store user ID in session
            
            // Close the statement and connection
            $stmt->close();
            $conn->close();
            
            // Display success popup and button to home page
            echo "<script>
                    alert('Login successful');
                    window.location.href = 'index.html';
                 </script>";
            exit;
        } else {
            // Invalid password
            echo "<script>
                    alert('Invalid password. Please try again.');
                    window.location.href = 'login.html';
                 </script>";
            exit;
        }
    } else {
        // User with the provided ID does not exist
        echo "<script>
                alert('User not found. Please try again.');
                window.location.href = 'login.html';
             </script>";
        exit;
    }
}
?>