<?php
// Connect to MySQL database
$mysqli = new mysqli("localhost", "root", "", "fyp");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$res = mysqli_query($mysqli,"select * from room" );
while($row = mysqli_fetch_assoc($res)){

    echo "<li class='box'>";
    echo "<div class='detail'>";
    echo "<div class='text'>";
    echo "<h2>" . $row['placename'] . "</h2>";
    echo "<p>" . $row['distric'] . "</p>";
    echo "</div>";
    echo "<p class='icon'>";
    echo "<i class='bx bx-bed'><span>" . $row['numbeds'] . "</span></i>";
    echo "<i class='bx bx-bath'><span>" . $row['numbathrooms'] . "</span></i>";
    echo "<a href='' class='btn'>Edit</a>";
    echo "<button class='btn delete-btn' data-id='" . $row['id'] . "'>Delete</button>";
    echo "</p>";
    echo "</div>";
    // Display image if available


        
        echo "<img src=Images/" . $row['thumbnail'] . ">";
    
   
    echo "<h4><a href='room.html'>" . $row['fee'] . "</a></h4>";
    echo "</li>";

}


/*
// Fetch data from the database
$result = $mysqli->query("SELECT * FROM room");

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<li class='box'>";
        echo "<div class='detail'>";
        echo "<div class='text'>";
        echo "<h2>" . $row['placename'] . "</h2>";
        echo "<p>" . $row['distric'] . "</p>";
        echo "</div>";
        echo "<p class='icon'>";
        echo "<i class='bx bx-bed'><span>" . $row['numbeds'] . "</span></i>";
        echo "<i class='bx bx-bath'><span>" . $row['numbathrooms'] . "</span></i>";
        echo "<a href='' class='btn'>Edit</a>";
        echo "<button class='btn delete-btn' data-id='" . $row['id'] . "'>Delete</button>";
        echo "</p>";
        echo "</div>";
        // Display image if available
        if ($row['thumbnail']) {
            $imageData = base64_encode($row['thumbnail']);
            echo "<img src='data:image/jpeg;base64, $imageData' alt='Thumbnail'>";
        } else {
            echo "No thumbnail available";
        }
        echo "<h4><a href='room.html'>" . $row['fee'] . "</a></h4>";
        echo "</li>";
    }
} else {
    echo "0 results";
}

*/
// Close database connection
$mysqli->close();
?>


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