<?php

$conn = new mysqli("localhost", "root", "","php_form");
 
$nameErr = $emailErr = $passwordErr = $roleErr = "";
$name = $email = $password = $role = "";

if(isset($_POST['name'])){
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])) {
      $nameErr = "Only letters and white space allowed";
    } else {
      $name = test_input($_POST["name"]);
    }
  
    // if (empty($_POST["role"])) {
    //   $roleErr = "role is required";
    // } else {
    //   $role = test_input($_POST["role"]);
    // }
  
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } 
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    else {
      $email = test_input($_POST["email"]);
    }
  
    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } elseif(strlen($_POST["password"]) <6){
      $passwordErr = "Password can't be less than 6 characters";
    } else {
      $password = test_input($_POST["password"]);
    }
  
    
  }
  
  
  $sql = "INSERT INTO users(name, role_id, email, password) VALUES ('$name','2','$email','$password')";

  if ($conn->query($sql) === TRUE) {
    echo "Registered successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
        <a class="nav-link" href="manager.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="profile(manager).php">Profile</a><span class="sr-only">(current)</span>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="all_employees.php">Employee List</a>
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
<h1>Register New Employee</h1>
</div>

<div class="form">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
*Name: <input type="text" name="name"  ><br> 
<span class="error"> <?php echo $nameErr;?></span>
<br><br>

*E-mail: <input type="text" name="email" ><br>
<span class="error"> <?php echo $emailErr;?></span>
<br><br>
*Password: <input type="password" name="password" ><br>
<span class="error"> <?php echo $passwordErr;?></span>
<br><br>
<input type="submit">
</form>
</div>




</body>
</html>