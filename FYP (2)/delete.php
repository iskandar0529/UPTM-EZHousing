<?php
$connection = mysqli_connect('localhost', 'root', '', 'fyp');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM room WHERE id = $id";
    if (mysqli_query($connection, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>