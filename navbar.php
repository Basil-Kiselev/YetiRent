<nav class="navbar navbar-expand-xl" style="background-color: #dce8f7;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Yeti Rent</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">How it work</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Catalogue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>
          </ul>                 
      </div>
      <div style="float: right; margin-right: 22px;">
        <?php if (isset($_SESSION['user'])): ?>
          <a href="profile.php" style="margin-right: 5em;"><?=$_SESSION['user']['email']?></a>
          <a href="logout.php">Logout</a>
        <?php else: ?>
          <a href="login.php" style="margin-right: 5em;">Login</a>
        <?php endif; ?>
      </div>  
    </div>
</nav>  