<?php

session_start();
require_once "dataSource/dbdriver.php";
require_once "services/validator.php";
require_once "services/auth.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $validator = new Validate($email, $password);
    $errors = $validator->run();  
    
    if (empty($errors)) {
        try {
          $userData = (new Auth())->registration($email, $password);
          header("location:intropage.php");                     
        } 
        catch (Exception $e) {
          $errors['password'][] = $e->getMessage();
        }        
    }        
}

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
  <form style="width: 400px; margin: auto; padding: 50px;" action="register.php" method="post">
    <div class="mb-3" style="text-align: center;">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div style="color: red;">
          <?php
          if (!empty($errors['email'])) {
              foreach ($errors['email'] as $errEmail){?>
              <ul>
                <li><?=($errEmail. ' ');?></li></ul> 
              <?php }} ?>
        </div>
    <div class="mb-3" style="text-align: center;">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div style="color: red;">
        <?php
        if (!empty($errors['password'])) {
            foreach ($errors['password'] as $errPass){?>
            <ul>
              <li><?=($errPass. ' ');?></li></ul> 
            <?php }} ?>
    </div>
    <button type="submit" class="btn btn-primary" style="margin: 0 auto; display: block;">Registration</button>
</form>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
