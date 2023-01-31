<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeti Rent</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body style = "background-image: url(images/bg1.jpg); background-size: cover;">
  <?php require_once "navbar.php"; ?>
  <div class="card" style="width: 350px; margin: auto;margin-top: 4%; padding: 30px;">
    <div class="card-body" style ="text-align: center;">
      <h5 class="card-title">Welcome - <?=$_SESSION['user']['email']?></h5>    
      <p class="card-text"></p>
      <a href="#" class="card-link" style="font-size: 24px;">Let's go</a>    
    </div>
  </div>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html> 