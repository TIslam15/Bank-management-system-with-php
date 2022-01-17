<?php
session_start();
if (!$_SESSION['login']){
  header('Location: login.php');
} elseif($_SESSION['role_id'] == 1){
  header('Location: manager.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="employee.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile(emp).php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create(cus).php">Create Customer ID</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="delete(cus).php">Delete Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      
    </ul>
  
  </div>
</nav>
<div class="jumbotron">
<h1>Employee's Dashboard</h1>
  <h1>The BANK</h1>
  <p>One True Safekeeper</p>
</div>
<section class="my-5">
  <div class="py-5">
    <h2 class="text-center">About us</h2>
  </div>
  <div class="container-fluid">
  <div class="row">
   
      <div class="row">
    <div class="text_1">
      <h2 class="display 4"> We give best services to our client</h2>
      <p class="py-3"> The BANK is the largest private commercial bank in Bangladesh.It has more braches than any other private bank. <br><br>

        N.B: This is section is subjected for future update.
      </p>
    </div>

  </div>
</div>
</section>

</body>
</html>