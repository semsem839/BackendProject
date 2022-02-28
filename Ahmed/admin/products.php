<?php session_start();?>
<?php include "config.php"?>
<?php include "includes/header.php"?>
<?php include "includes/navbar.php"?>

<?php
if(isset($_GET['action'])){
    $do = $_GET['action'];
}else{
    $do = 'index';
  }                                                                                     
    ?>
    <?php if ($do== "index"):?>
     <h2 class="text-center">All Products</h2>
     <?php
$stmt=$con->prepare("SELECT * FROM `products`");
$stmt->execute();
$products=$stmt->fetchAll();
?>   

<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">product_name</th>
      <th scope="col">product_price</th>
      <th scope="col">status</th>
      <th scope="col">Controls</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($products as $product):?>
    <tr>
      <th scope="row">1</th>
      
      <td><?=$product['product_name']?></td>
      <td><?=$product['product_price']?></td>
      <td><?=$product['product_status']?></td>
    <td>
    <button type="button" class="btn btn-primary">Show</button>
      <button type="button" class="btn btn-warning">Edit</button>
      <button type="button" class="btn btn-danger">Delete</button>
    </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<button type="button" class="btn btn-primary">Add Product</button>
</div>

<?php elseif($do == 'create'):?>
    <div class="container">
<form method= "post" action="create">
  <div class="mb-3">
    <label for="exampleProductname1" class="form-label">product_name</label>
    <input type="email" class="form-control" name="product_name" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPrice1" class="form-label">product_price</label>
    <input type="password" class="form-control" name="product_pricce">
  </div>

  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">status</label>
    <input type="password" class="form-control" name="status">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php elseif($do == 'store'):?>
<?php

    $product_name = $_POST['productname'];
    $product_price= $_POST['product-price'];
    $product_status =$_POST['product-status'];
    $stmt = $con->prepare("INSERT INTO `products`(`product_name`, `product_price`, `product_status`) VALUES ('[?]','[?]','[?]')");
    $stmt->execute(array($product_name , $product_price , $product_status));
    header("location:products.php");
    

?>
<?php elseif($do == 'edit'):?>
<?php
    $stmt = $con->prepare("SELECT * FROM products WHERE id=?");
    $stmt->execute(array());
    $user = $stmt->fetch();
    $count = $stmt->rowCount();
?>
<?php elseif($do== "edit"):?>
<div class="container">
<form method= "post" action="edit">
  <div class="mb-3">
    <label for="exampleProductname1" class="form-label">product_name</label>
    <input type="email" class="form-control" name="product_name" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPrice1" class="form-label">product_price</label>
    <input type="password" class="form-control" name="product_pricce">
  </div>

  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">status</label>
    <input type="password" class="form-control" name="status">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>




<?php elseif($do == 'update'):?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_status = $_POST['product_status'];
 $stmt=$con->prepare("INSERT INTO `products`( `product_name`, `product_price`, `product_status`) VALUES ('[?]','[?]','[?]')");
 $stmt->execute(array($product_name, $product_price, $product_status ));
 header("location:products.php");
 }

?>

<?php elseif($do == 'show'):?>
<h2 class="text-center"> Show Product</h2>
<div class="container">
<form method= "post" action="show">
  <div class="mb-3">
    <label for="exampleProductname1" class="form-label">product_name</label>
    <input type="email" class="form-control" name="product_name" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPrice1" class="form-label">product_price</label>
    <input type="password" class="form-control" name="product_pricce">
  </div>

  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">status</label>
    <input type="password" class="form-control" name="status">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



<?php
    $stmt = $con->prepare("SELECT * FROM products WHERE `id`=?");
    $stmt->execute(array());
    $user = $stmt->fetch();
?>
<?php elseif($do == "delete"):?>
<h2 class="text-center">Delete Product</h2>
<div class="container">
<form method= "post" action="delete">
  <div class="mb-3">
    <label for="exampleProductname1" class="form-label">product_name</label>
    <input type="email" class="form-control" name="product_name" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPrice1" class="form-label">product_price</label>
    <input type="password" class="form-control" name="product_pricce">
  </div>

  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">status</label>
    <input type="password" class="form-control" name="status">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



<?php
    $productid = $_GET['productid'];
    $stmt =$con->prepare("DELETE FROM products WHERE id=?");
    $stmt->execute(array($productid));
    header("location:products.php");
?>

<?php else:?>
<h1>404 page</h1>
<?php endif?>

<?php include "includes/footer.php"?>




