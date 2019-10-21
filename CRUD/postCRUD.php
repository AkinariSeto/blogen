<?php
require_once "connection.php";

function save_post($posttitle, $postbody, $postcategory, $current_user_id) {
    $conn = connect();

    // Create the query
    $sql = "INSERT INTO posts(post_title, post_body, category_id, user_id)
            VALUES('$posttitle', '$postbody', '$postcategory', $current_user_id)";
        // submit to mysql
        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "<div class='alert alert-success'>New Record added successfully.</div>";
            return $result;
        }else {
            echo "Error: " . $conn->error;
        }
}

function get_posts(){
    $conn = connection();
    $sql = "SELECT * FROM posts
            INNER JOIN categories ON posts.category_id = categories.category_id
            INNER JOIN users ON posts.user_id = users.user_id";
    $result = $conn->query($sql);

    $rows = array();
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

// get only one user
function get_specific_post($post_id) {
    $conn = connection();
    $sql = "SELECT * FROM posts
            INNER JOIN categories ON posts.category_id = categories.category_id
            INNER JOIN users ON posts.user_id = users.user_id
            WHERE posts.post_id = $post_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

//update the user
function update_post($post_id, $posttitle, $postbody) {
    //call the connection
    $conn = connect();

    //create the query to update the user
    $sql = "UPDATE posts SET post_title='$posttitle', post_body='$postbody'
    WHERE post_id='$post_id'";
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
function delete_post($post_id) {
    //call the connection
    $conn = connect();

    //create the query to delete user
    $sql = "DELETE FROM posts WHERE post_id=$post_id";
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