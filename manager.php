<?php
session_start();
if (!$_SESSION['login']){
  header('Location: login.php');
} elseif($_SESSION['role_id'] == 2){
  header('Location: employee.php');
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
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
        <a class="nav-link" href="manager.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="profile(manager).php">Profile</a><span class="sr-only">(current)</span>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="all_employees.php">Employee List<span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="create(emp)manager.php">New Employee</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="delete(emp)manager.php">Delete Employee</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="create(cus)manager.php">New Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="all_customer_list.php">All customer</a>
      </li>
      <li class="nav-item">
      
        <a class="nav-link" href="delete(cus)manager.php">Delete Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
    </ul>
  </div>
</nav>
<div class="jumbotron">
<h1>Manager's Dashboard</h1>
  <h1>The BANK</h1>
  <p>One True Safekeeper</p>
</div>



</body>
</html>