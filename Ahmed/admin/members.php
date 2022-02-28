
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
     <h2 class="text-center">All Members</h2>
     <?php
$stmt=$con->prepare("SELECT * FROM `users`");
$stmt->execute();
$users=$stmt->fetchAll();
?>   

<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Controls</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($users as $user):?>
    <tr>
      <th scope="row">1</th>
      
      <td><?=$user['id']?></td>
      <td><?=$user['username']?></td>
      <td><?=$user['email']?></td>
      <td><?=$user['password']?></td>
    <td>
    <button type="button" class="btn btn-primary">Show</button>
      <button type="button" class="btn btn-warning">Edit</button>
      <button type="button" class="btn btn-danger">Delete</button>
    </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<button type="button" class="btn btn-primary">Add Member</button>
</div>

<?php elseif($do == 'create'):?>
    <div class="container">
<form method= "post" action="create">
  <div class="mb-3">
    <label for="id" class="form-label">Id</label>
    <input type="id" class="form-control" name="id">
  <div class="mb-3">
    <label for="exampleInputUsername1" class="form-label">Username</label>
    <input type="usernaem" class="form-control" name="Username">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<?php elseif($do == 'store'):?>
<?php

    $id = $_POST['id'];
    $username= $_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt = $con->prepare("INSERT INTO `user`(`id`, `username`, `email`, `password`) VALUES ('[?]','[?]','[?]','[?]')");
    $stmt->execute(array($id,$username ,$email, $password ));
    header("location:users.php");
    

?>
<?php elseif($do == 'edit'):?>
<?php
    $stmt = $con->prepare("SELECT * FROM user");
    $stmt->execute(array());
    $user = $stmt->fetch();
    $count = $stmt->rowCount();
?>
<?php elseif($do== "edit"):?>
<div class="container">
<form method= "post" action="edit">
  <div class="mb-3">
    <label for="id" class="form-label">Id</label>
    <input type="id" class="form-control" name="id">
  <div class="mb-3">
    <label for="exampleInputUsername1" class="form-label">Username</label>
    <input type="usernaem" class="form-control" name="Username">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<?php elseif($do == 'update'):?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password= $_POST['password'];
 $stmt=$con->prepare("INSERT INTO `users`(`id`, `username`, `password`, `email`,`password`) VALUES ('[?]','[?]','[?]','[?]')");
 }
 ?>
         <?php elseif($do == 'show'):?>
                    <h2 class="text-center"> Show Product</h2>
                    <form method= "post" action="show">
                    <div class="container">
                    <div class="mb-3">
                        <label for="exampleId1" class="form-label">Id</label>
                        <input type="id" class="form-control" name="id" >
                      </div>
                      <div class="mb-3">
                        <label for="exampleUsername1" class="form-label">Username</label>
                        <input type="username" class="form-control" name="username" >
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                      </div>
                    
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                      </div>
                    
                    
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    


<?php elseif($do == 'show'):?>
<h2 class="text-center"> Show Product</h2>
<form method= "post" action="show">
<div class="container">
<div class="mb-3">
    <label for="exampleId1" class="form-label">Id</label>
    <input type="id" class="form-control" name="id" >
  </div>
  <div class="mb-3">
    <label for="exampleUsername1" class="form-label">Username</label>
    <input type="username" class="form-control" name="username" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
    $stmt = $con->prepare("SELECT * FROM users");
    $stmt->execute(array());
    $user = $stmt->fetch();
?>
<?php elseif($do == "delete"):?>
<h2 class="text-center">Delete User</h2>
<div class="container">
<form method= "post" action="delete">
  <div class="mb-3">
    <label for="exampleUsername1" class="form-label">Username</label>
    <input type="username" class="form-control" name="username" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



<?php
    
    $stmt =$con->prepare("DELETE FROM users WHERE ");
    $stmt->execute(array());
    header("location:members.php");
?>

<?php else:?>
<h1>404 page</h1>
<?php endif?>

<?php include "includes/footer.php"?>





