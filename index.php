<?php include_once ('db.php');

 session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Movie Tickets Management System</title>
</head>
<body>
	<div class="overall-background">
	<?php include_once 'header1.php'; ?>
  <?php include 'MovieCarousel.php';
        include 'movieLIst2.php'; ?>

  <?php include 'footer.php'; ?>
</div>
</body>
</html>
