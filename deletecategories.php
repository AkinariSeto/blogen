<?php
require "CRUD/categoryCRUD.php";
if(isset($_POST['delete'])){
    $delete_category_id = $_POST['delete_id'];
    $result = delete_category($delete_category_id);
    if($result){
        header('location: categories.php');
   }
}

?>