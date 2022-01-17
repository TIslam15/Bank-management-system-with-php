<?php

$conn = new mysqli("localhost", "root", "","php_form");

session_start();
if (!$_SESSION['login']){
  header('Location: login.php');
} elseif($_SESSION['role_id'] == 1){
  header('Location: manager.php');
}
if(isset($_POST['id'])){
$balance=$_POST['balance'];
$id = $_POST['id'];
// echo $balance;
$query="SELECT balance from customer where id='$id'";
$result=mysqli_query($conn,$query);
$present=mysqli_num_rows($result);
if($present > 0)
{
  $row=mysqli_fetch_array($result);
  $debit=$row['balance'];

  if($balance < 0){
    echo "Amount must be greater than 0";
  } else {
    if($balance <= $debit){
      $t=$debit-$balance;
      $querys="UPDATE customer Set balance='$t' where id='$id' ";
      $result=mysqli_query($conn,$querys);
      echo "Debit $balance amount is successful!<br>";
      echo "$id final balance is $t<br>";
    } else {
      echo "Insufficient Balance!";
    }
  }
    
}
  
else{
  echo "Debit Account Not Found!";
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
<?php include 'manager_menu.php';?>
<div class="jumbotron">
<h1>Withdraw</h1>
  
</div>

<section class="my-5">
  <div class="py-5">
    <h2 class="text-center">Customer Profile</h2>
  </div>
  <div class="container-fluid">
  <div class="row">
   
      <div  class="row">
    <div class="text_1">
        <div class="container-fluid">

    <form action="debit.php" method="post">
    Bank ID: <input type="text" name="id"><br><br>
            
  Debit Balance: <input type="int" name="balance"><br><br>
    

<input type="submit" value = "submit">
</form>

</div>
      </p>
    </div>

  </div>
</div>
</section>

</body>
</html>