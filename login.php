<?php  
session_start();

require_once "datasource/dbdriver.php";
require_once "services/validator.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $mysql = new DbDriver('localhost', 'root', '','yeti_rent');
    $validData = new Validate($_POST['email'],$_POST['password']);
    $validData = $validData->trimData();
    $userData = $mysql->getUserData($validData['email']);

        if(empty($userData)){
            echo "User not found";
        } else {
            if($userData['email'] === $validData['email'] && $userData['password'] === $validData['password']){
              session_start();
              $_SESSION['username'] = $userData['email'];
              header("location: intropage.php");
            } else {
                  echo "Wrong email or password";
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
<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Yeti Rent</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="#">How it work</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Catalogue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>        
        </ul>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Basket</a>
          </li>        
        </ul>
      </div>
    </div>
  </nav>
  <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>