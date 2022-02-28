<?php include "config.php"?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$email=$_POST['adminemail'];
$password=sha1($_POST['adminpassword']);
$stmt=$con->prepare("SELECT * FROM users WHERE email");
$stmt->execute(array($email, $password));
$count=$stmt->rowCount();
if($count==1){
  $SESSION['ID']=$user['id'];
  $SESSION['USERNAME']=$user['username'];
  $SESSION['EMAIL']=$user['email'];
  $SESSION['ROlE']=$user['role'];
  
}
}
?>
<?php include "includes/header.php"?>

<div class="container">
<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>        
</div>







<?php include "includes/footer.php"?>