<?php
require_once "connection.php";

function save_category($categoryname) {
    $conn = connect();

    // Create the query
    $sql = "INSERT INTO categories(category_name)
            VALUES('$categoryname')";
        // submit to mysql
        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "<div class='alert alert-success'>New Record added successfully.</div>";
            return $result;
        }else {
            echo "Error: " . $conn->error;
        }
}

function get_categories(){
    //call the connection
    $conn = connect();

    //Create the query
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);

    // initialize an empty array
    $rows = array();
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }

    // print_r($rows);
    return $rows;
}

// get only one user
function get_specific_category($category_id) {
    //call the connection
    $conn = connect();

    // create the query
    $sql = "SELECT * FROM categories WHERE category_id=$category_id";
    //execute the query
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    return $row;
}

//update the user
function update_category($category_id, $categoryname) {
    //call the connection
    $conn = connect();

    //create the query to update the user
    $sql = "UPDATE categories SET category_name='$categoryname'
    WHERE category_id='$category_id'";
    //submit the update request
    $result = $conn->query($sql);

    //check if successful
    if($result == TRUE) {
        return $result;
    } else {
        echo "Error: " . $conn->error;
    }
}

//delete the user
function delete_category($category_id) {
    //call the connection
    $conn = connect();

    //create the query to delete user
    $sql = "DELETE FROM categories WHERE category_id=$category_id";
    //submit the query
    $result = $conn->query($sql);
    //check if successful
    if($result == TRUE) {
        return $result;
    } else {
        echo "Error: " . $conn->error;
    }
}

// All CRUD
function count_posts(){
    $conn = connrction();
    $sql = "SELECT COUNT(*) as total_posts FROM posts";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}
?>


?>