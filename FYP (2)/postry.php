<?php
$connection=mysqli_connect('localhost','root','','fyp');

if (isset($_GET['id'])){
	$id=$_GET['id'];
	$delete=mysqli_query($connection,"DELETE FROM 'room' WHERE 'id' = '$id'");
}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>room</title>
	
	<!--link to css -->
	<link rel="stylesheet" href="style.css">
	
	<!-- icon -->
	<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
	<!-- navbar -->
	<header>
		<div class="nav container">
		<!-- logo -->
			<a href="index.html" class="logo"><i class='bx bx-home'></i>EzHousing</a>
			<!-- menu -->
			<input type="checkbox" name="" id="menu">
			<label for="menu"> <i class='bx bx-menu' id="menu-icon"></i></label>
			<!--navlist-->
			<ul class="navbar">
				
			</ul>
	
			<!-- login -->
			<a href="login.html" class="btn">Login</a>
		</div>
	</header>
	
	<div class="heading">
	<span>Recent</span>
	<h2>Our featured properties</h2>
<p>Post a room</p>
</div>
	
<div class="product-field">	
	<section class="properties-container container" id="properties">

<ul class="items">
	
 	 <!-- PHP script to generate dynamic content -->
                <?php include 'post.php'; ?>
	
	<!--box1-->
	<li data-category="" class="box" data-price="">
					<picture>
						<img src="img/house1.jpg" alt="">
					</picture>
					<div class="detail">
						<div class="text">
							<h2>The palace</h2>
							<p>pandan jaya</p>
						</div>
						<p class="icon">
							<i class='bx bx-bed'><span>5</span></i>
							<i class='bx bx-bath'><span>3</span></i>
							<a href="" class="btn">Edit</a>
							<a href="" class="btn">Delete</a>
						</p>
						
					</div>
					<h4><a href="room.html">RM300.78</a></h4>
					
				</li>
</ul>
</section>
</div>
<section class="newsletter container">
	<a href="more.html" class="btn">Post</a>
</section>
<!--footer-->
<section class="footer">
<div class="footer-container container"><h2>R.state</h2>
	<div class="footer-box">
	<h3>quick links</h3>
	<a href="#">agency</a>
	<a href="#">building</a>
	<a href="#">rates</a>
	</div>
	<div class="footer-box">
	<h3>contact</h3>
	<a href="#">012-3456789</a>
	<a href="#">yourmail@gmail.com</a>
	<div class="social">
		<a href="#"><i class='bx bx1-facebook'></i></a>
		<a href="#"><i class='bx bx1-twitter'></i></a>
		<a href="#"><i class='bx bx1-instagram'></i></a>
		</div>
	</div>
	</div>
</section>
<!-- copyright-->
<div class="copyright">
<p>&#169; CarpoolVenom all right</p></div>
	
	<script>
    // Function to attach event listeners to delete buttons
    function attachDeleteEventListeners() {
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var roomId = this.getAttribute('data-id');
                deleteRoom(roomId);
            });
        });
    }

    // Function to delete a room
    function deleteRoom(id) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_room.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status == 200) {
                fetchDynamicContent(); // Reload dynamic content after deletion
            } else {
                console.error('Request failed. Status: ' + xhr.status);
            }
        };
        xhr.onerror = function() {
            console.error('Request failed');
        };
        xhr.send('id=' + id);
    }
</script>
	
</body>
</html>