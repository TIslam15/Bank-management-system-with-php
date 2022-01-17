<?php
session_start();
if (!$_SESSION['login']){
  header('Location: login.php');
} elseif($_SESSION['role_id'] == 1){
  header('Location: manager.php');
}

$name = '';

$conn = new mysqli("localhost", "root", "","php_form");

$sql = "SELECT * FROM users WHERE id = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
 //echo "id: " . $row["id"]. " - Name: " . $_SESSION['manager_name']. " - Email" . $row["email"]. "<br>";
    
  }
} else {
  // echo "0 results";
}









if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id=$_SESSION['login_id'];
	
    
	
    $sql = "update users set name='$name', email='$email'  where id='$id'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['employee_name'] = $name;
    $_SESSION['emoloyee_email'] = $email;
    echo "Profile update successfully. ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
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
        <a class="nav-link" href="delete(cus)manager.php">Delete Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

    </ul>
  </div>
</nav>
<div class="jumbotron">
<h1>Edit Employee's Profile <a  href="edit(employees).php"><i class="fas fa-edit"></i></a></h1>
</div>
<form action="edit(employees).php" method="post">

        Name: <input type="text" name="name" value='<?php echo $_SESSION["employee_name"];?>'><br><br>
        
        
    
   Email: <input type="text" name="email" value='<?php  echo $_SESSION["employee_email"];?>'><br><br>        
   

   <input type="submit" name="update" value="Update PROFILE">
</form>



</body>
</html>

<?php

$conn->close();

?>