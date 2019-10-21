<?php
require "CRUD/postCRUD.php";
if(isset($_POST['delete'])){
    $delete_post_id = $_POST['delete_id'];
    $result = delete_post($delete_post_id);
    if($result){
        header('location: posts.php');
   }
}

?>