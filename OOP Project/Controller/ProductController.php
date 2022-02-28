<?
require_once "ResourceController.php";
class ProductController implements ResourceController{
public function index(){
return "hello from user index";              
}

public function create(){
 return "hello from create index";                 
}


public function store(){
return "return hello from store  index";                
}
}





?>