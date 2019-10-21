<?php
require "CRUD/userCRUD.php";
if(isset($_POST['delete'])){
    $delete_user_id = $_POST['delete_id'];
    $result = delete_user($delete_user_id);
    if($result){
        header('location: users.php');
   }
}

?>