<?php

$conn = new mysqli("localhost", "root", "","php_form");

session_start();
if (!$_SESSION['login']){
  header('Location: login.php');
} elseif($_SESSION['role_id'] == 1){
  header('Location: manager.php');
}
if(isset($_POST['id1']) && isset($_POST['id2'])){
$amount=$_POST['amount'];

$id1 = $_POST['id1'];
$id2 = $_POST['id2'];
// echo $balance;
$query1="SELECT balance from customer where id='$id1'";
$result1=mysqli_query($conn,$query1);
$present1=mysqli_num_rows($result1);

$query2="SELECT balance from customer where id='$id2'";
$result2=mysqli_query($conn,$query2);
$present2=mysqli_num_rows($result2);

if($present1>0 && $present2>0)
{
  $row1=mysqli_fetch_array($result1);
  $balance1=$row1['balance'];
  $row2=mysqli_fetch_array($result2);
  $balance2=$row2['balance'];

  if($amount < 0){
    echo "Amount must be greater than 0";
  } else {
    if($balance1>=$amount){
  
      $final_balance1=$balance1-$amount;
      $final_balance2=$balance2+$amount;
  
      $query1="UPDATE customer Set balance='$final_balance1' where id='$id1' ";
      $query2="UPDATE customer Set balance='$final_balance2' where id='$id2' ";
  
      $result1=mysqli_query($conn,$query1);
      $result2=mysqli_query($conn,$query2);
  
      echo "fund transfer $amount from $id1 to $id2 is successful<br>";
      echo "$id1 final balance is $final_balance1<br>";
      echo "$id2 final balance is $final_balance2<br>";
    }
    else{
      echo "insufficient balance";
    }
  }
  
}
else
{
    echo "Credit/Debit Account Not Found!";
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
<h1>Transfer fund </h1>
  
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
      

    <form action="transfer.php" method="post">
    Bank ID(from): <input type="text" name="id1"><br><br>
    Bank ID(to): <input type="text" name="id2"><br><br>
            
    Transfer Balance: <input type="int" name="amount"><br><br>
    

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