<?php

$conn = new mysqli("localhost", "root", "","php_form");

session_start();
if (!$_SESSION['login']){
  header('Location: login.php');
} elseif($_SESSION['role_id'] == 1){
  header('Location: manager.php');
}
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $balance = $_POST['balance'];    
  $acc_open_date = $_POST['acc_open_date'];

  $sql = "INSERT INTO customer (id, name, address, balance, acc_open_date) VALUES ('$id', '$name', '$address', '$balance', '$acc_open_date')";

  if ($conn->query($sql) === TRUE) {
      echo "NEW CUSTOMER PROFILE CREATED";
  }
  else{
      echo "Error: " .  $sql . "<br>" . $conn ->error; 
  }
}

$conn->close();

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
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile(emp).php">Profile</a>
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
    <h2 class="text-center">New Customer Profile</h2>
  </div>
  <div class="container-fluid">
  <div class="row">
   
      <div  class="row">
    <div class="text_1">
        <div class="container-fluid">
      

    <form action="create(cus).php" method="post">
    Bank ID: <input type="text" name="id"><br><br>
    Name: <input type="text" name="name"><br><br>
    Address: <input type="text" name="address"><br><br>        
    Balance: <input type="int" name="balance"><br><br>
    Account Opening Date: <input type="text" name="acc_open_date"><br><br>

<input type="submit" value = "CREATE ACCOUNT">
</form>

</div>
      </p>
    </div>

  </div>
</div>
</section>

</body>
</html>