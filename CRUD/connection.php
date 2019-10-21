<?php



function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "blogen";
    // create connection to database
    $conn = new mysqli($servername, $username, $password, $database);

    //check connection
    if($conn->connect_error){
        // cut the connection and show error message
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
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