
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-Jewels</title>
    <link rel="stylesheet" href="/css/Homepage.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/signIn.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/cart.css?v=<?php echo time(); ?>">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
 
<nav class="navbar navbar-expand-xxl navbar-dark g-0" style="background-color: #5D7599; margin:0;" id="header">
  <div class="container">
    <a class="navbar-brand" href="/" style="font-size: 30px;">M-Jewelry</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/home/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart">Cart</a>
        </li>
        <li class="nav-item">
          <?php if (!empty($_SESSION["user"])) { ?>
            <a class="nav-link" href="/signIn/logout">Logout</a>
          <?php } else { ?>
            <a class="nav-link" href="/signIn">Login</a>
          <?php } ?>
      </li>
      </ul>
    </div>
  </div>
</nav>



<div class="nav-username">
  <?php if (!empty($_SESSION["user"])) {
    $user = unserialize($_SESSION["user"]);
    ?>
    <p><?php //echo $user->getUsername(); ?></p>
  <?php } ?>
  </div>     