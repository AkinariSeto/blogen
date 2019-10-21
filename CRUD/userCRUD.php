<?php
require_once "connection.php";

function login($useremail, $userpassword) {
    //call the connection
    $conn = connect();

    // Create the query
    $sql = "SELECT * FROM users WHERE user_email='$useremail' AND user_password='$userpassword'";
    //submit to mysql
    $result = $conn->query($sql);

    //check if the user exist
    if($result->num_rows > 0) {
        //get the values
        $row = $result->fetch_assoc();
        //assign the valies to session
        $_SESSION['user_id'] = $row['user_id']; //session variable = database value
        header("location: users.php");
    } else {
        echo "<p class='text-danger text-center'>Invalid Username or Password</p>";
    }
}

function save_user($userfullname, $useremail, $userpassword, $userbio) {
    $conn = connect();

    // Create the query
    $sql = "INSERT INTO users(user_fullname, user_email, user_password,user_bio)
            VALUES('$userfullname', '$useremail', '$userpassword', '$userbio')";
        // submit to mysql
        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "<div class='alert alert-success'>New Record added successfully.</div>";
            return $result;
        }else {
            echo "Error: " . $conn->error;
        }
}

function get_users(){
    //call the connection
    $conn = connect();

    //Create the query
    $sql = "SELECT * FROM users";
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
function get_specific_user($user_id) {
    //call the connection
    $conn = connect();

    // create the query
    $sql = "SELECT * FROM users WHERE user_id=$user_id";
    //execute the query
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    return $row;
}

//update the user
function update_user($userfullname, $useremail, $userpassword, $userbio) {
    //call the connection
    $conn = connect();

    //create the query to update the user
    $sql = "UPDATE users SET user_fullname='$userfullname', user_email='$useremail',
    user_password='$userpassword', user_bio='$userbio'
    WHERE user_id='$user_id'";
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
function delete_user($user_id) {
    //call the connection
    $conn = connect();

    //create the query to delete user
    $sql = "DELETE FROM users WHERE user_id=$user_id";
    //submit the query
    $result = $conn->query($sql);
    //check if successful
    if($result == TRUE) {
        return $result;
    } else {
        echo "Error: " . $conn->error;
    }
}


?>