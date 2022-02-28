<?php session_start()?>
<?php if(isset($_SESSION['ID'])): ?>
    <?php require "config.php"?>
    <?php
        if(isset($_SESSION['LANG']) && $_SESSION['LANG'] = 'ar'){
            include "langs/ar.php";
        }else{
            include "langs/en.php";
        }
    ?>
    <?php include "includes/header.php"?>
    <?php require "includes/navbar.php"?>



<?php require "includes/footer.php"?>

<?php else: ?>
<?php header("location:index.php")?>
<?php endif?>