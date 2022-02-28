<?php session_start();?>
<?php include "config.php"?>
<?php include "includes/header.php"?>
<?php include "includes/navbar.php"?>

<?php if(isset($_GET['action'])){
  $do= $_GET['action'];
}
else{
  $do= "index";
}
  ?>
<?php if($do == "index"):?>
<h2 class="text-center">All Categories</h2>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Quantity</th>
      <th scope="col">Quality</th>
      <th scope="col">Status</th>
      <th scope="col">Controls</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($categories as $categories):?>
      <tr>
      <th scope="row">1</th>
      <td><?=$user['Quantity']?></td>
      <td><?=$user['Quality']?></td>
      <td><?=$user['Status']?></td>
      <td><?=$user['controls']?></td>
    </tr>
  <?php endforeach?>
  </tbody>
</table>
<a class="btn btn-primary">Add Categories</a>

</div>
  <?php elseif($do == "create"):?>
  <h2> Hello Create </h2>
  <?php elseif($do == "store"):?>
  <h2> Hello Store </h2> 
  <?php elseif($do == "edit"):?>
  <h2> Hello Edit </h2>
  <?php elseif($do == "update"):?>
  <h2> Hello Update </h2>
  <?php elseif($do == "show"):?>
  <h2> Hello Show </h2>
  <?php elseif($do == "delete"):?>
  <h2> Hello Delete </h2>

  <?php else:?>
    <h2> 404 page</h2>
    <?php endif?>


    <?php include "includes/footer.php"?>