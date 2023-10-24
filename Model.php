<!DOCTYPE html>
<html lang="en">
<head>
    <title>forms get</title>
<style>
body{
background-color:green;
color:yellow;
}
form{
justify-content: center;
align-items: center;

}
</style>
</head>
<body>
<h1>ENTER DETAILS TO CREATE GARBAGE BIN</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $name = $_POST['name'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $payment = $_POST['payment'];
    
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "agri";

  $con = mysqli_connect($servername, $username, $password, $database);

  $sql = "INSERT INTO `agri1` (`name`, `product`, `quantity`, `location`, `payment`) VALUES ('$name', '$product', '$quantity', '$location', '$payment');";


  $result = mysqli_query($con, $sql);

  if ($result)
 {
    echo "Data inserted successfully";

  } 
else
 {
    echo "Data not inserted successfully";
  }
}
?>
<form action="/model/model.php" method="post">

  <br><br>  
Customer Name:
  <input type="text" id="name" name="name" ><br><br>
Product:
  <input type="text" id="product" name="product" ><br><br>
Quantity(in tonns):
  <input type="text" id="quantity" name="quantity" ><br><br>
Location:
  <input type="text" id="location" name="location" ><br><br>
Payment:
  <input type="text" id="payment" name="payment" ><br><br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>
