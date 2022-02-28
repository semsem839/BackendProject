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
     <h2 class="text-center">All Categories</h2>
     <?php
$stmt=$con->prepare("SELECT * FROM `categories`");
$stmt->execute();
$categories=$stmt->fetchAll();
?>   

<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Quanity</th>
      <th scope="col">Quality</th>
      <th scope="col">status</th>
      <th scope="col">Controls</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($categories as $category):?>
    <tr>
      <th scope="row">1</th>
      
      <td><?=$category['Quantity']?></td>
      <td><?=$category['Quality']?></td>
      <td><?=$category['status']?></td>
    <td>
    <button type="button" class="btn btn-primary">Show</button>
      <button type="button" class="btn btn-warning">Edit</button>
      <button type="button" class="btn btn-danger">Delete</button>
    </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<button type="button" class="btn btn-primary">Add Categories</button>
</div>

<?php elseif($do == 'create'):?>
    <div class="container">
<form method= "post" action="create">
  <div class="mb-3">
    <label for="exampleQuanity1" class="form-label">Quantity</label>
    <input type="quanity" class="form-control" name="quanity" >
  </div>
  <div class="mb-3">
    <label for="exampleInputQuality1" class="form-label">Quality</label>
    <input type="Quality" class="form-control" name="quality">
  </div>

  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">status</label>
<input type="status" class="form-control" name="status">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php elseif($do == 'store'):?>
<?php

    $quantity = $_POST['quantity'];
    $quality= $_POST['quality'];
    $status =$_POST['product-status'];
    $stmt = $con->prepare("INSERT INTO `categories`(`quantity`, `quality`, `status`) VALUES ('[?]','[?]','[?]')");
    $stmt->execute(array($quantity , $quality , $status));
    header("location:products.php");
    

?>
<?php elseif($do == 'edit'):?>
<?php
    $stmt = $con->prepare("SELECT * FROM c");
    $stmt->execute(array());
    $user = $stmt->fetch();
    $count = $stmt->rowCount();
?>
<?php elseif($do== "edit"):?>
<div class="container">
<form method= "post" action="edit">
  <div class="mb-3">
  <label for="exampleQuantity" class="form-label">Quantity</label>
    <input type="quantity" class="form-control" name="quantity" >
  </div>
  <div class="mb-3">
    <label for="exampleInputQuality1" class="form-label">Quality</label>
    <input type="quality" class="form-control" name="Quality">
  </div>

  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">status</label>
    <input type="status" class="form-control" name="status">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

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
        $quanity= $_POST['quantity'];
        $quality = $_POST['quality'];
        $status = $_POST['status'];
 $stmt=$con->prepare("INSERT INTO `categories`(` `Quantity`, `Quality`, `status`) VALUES ('[?]','[?]','[?]')");
 $stmt->execute(array($quanity, $quality, $status ));
 header("location:categories.php");
 }

?>

<?php elseif($do == 'show'):?>
<h2 class="text-center"> Show Category</h2>
<div class="container">
<form method= "post" action="show">
  <div class="mb-3">
    <label for="exampleQuantity" class="form-label">Quantity</label>
    <input type="quantity" class="form-control" name="quantity" >
  </div>
  <div class="mb-3">
    <label for="exampleInputQuality1" class="form-label">Quality</label>
    <input type="quality" class="form-control" name="Quality">
  </div>

  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">status</label>
    <input type="status" class="form-control" name="status">
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
    <label for="exampleQuantity" class="form-label">Quantity</label>
    <input type="quantity" class="form-control" name="quantity" >
  </div>
  <div class="mb-3">
    <label for="exampleInputQuality1" class="form-label">Quality</label>
    <input type="quality" class="form-control" name="Quality">
  </div>

  <div class="mb-3">
    <label for="exampleInputStatus1" class="form-label">status</label>
    <input type="status" class="form-control" name="status">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



<?php
    
    $stmt =$con->prepare("DELETE FROM categories");
    $stmt->execute(array());
    header("location:categories.php");
?>

<?php else:?>
<h1>404 page</h1>
<?php endif?>

<?php include "includes/footer.php"?>




