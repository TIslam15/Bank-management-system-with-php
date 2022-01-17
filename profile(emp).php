<?php
session_start();
if (!$_SESSION['login']){
  header('Location: login.php');
} elseif($_SESSION['role_id'] == 1){
  header('Location: manager.php');
}


$conn = new mysqli("localhost", "root", "","php_form");
$login_id ='';
$login_id = $_SESSION['login_id'];

$sql = "SELECT * FROM users WHERE id = $login_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email" . $row["email"]. "<br>";
  }
} else {
  // echo "0 results";
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
        <a class="nav-link" href="employee.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
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

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Employees's Profile <a class="nav-link" href="edit(employees).php"><i class="fas fa-edit"></i></a></h1></h1>
    <p class="lead">Name: <?php 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo $row["name"];
      }
    }
    ?>
    </p>
    <p class="lead">Email: <?php 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo $row["email"];
      }
    }
    ?>
    </p>
  </div>
</div>


</body>
</html>