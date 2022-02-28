<?php
require_once "Controller/ProductController.php";
require_once "Controller/UserController.php";
require_once "Controller/MemberController.php";

$amit= new MemberController;

$amit->set_name("amit");
echo $amit->get_name();

echo $amit-> age="27";
?>