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
  
    if (empty($_POST["role"])) {
      $roleErr = "role is required";
    } else {
      $role = test_input($_POST["role"]);
    }
  
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
  
  
  $sql = "INSERT INTO users(name, role_id, email, password) VALUES ('$name','$role','$email','$password')";

  if ($conn->query($sql) === TRUE) {
    echo "Registered successfully. Please login to go to your dashboard";
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

<html>
<body>
    <h1>Register </h1>
    <link rel="stylesheet" href="style.css" >
      

<div class="form">
<img src="3.jpg" >
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
*Name: <input type="text" name="name"  ><br> 
<span class="error"> <?php echo $nameErr;?></span>
<br><br>
*Role: <select name="role" id="role">
  <option value="">Select Any</option>
  <option value="1">Manager</option>
  <option value="2">Employee</option>
</select>
<br><br>
*E-mail: <input type="text" name="email" ><br>
<span class="error"> <?php echo $emailErr;?></span>
<br><br>
*Password: <input type="password" name="password" ><br>
<span class="error"> <?php echo $passwordErr;?></span>
<br><br>
<input type="submit">
<a href="login.php" class="btn btn-info">login</a>
</form>
</div>


</body>
</html>