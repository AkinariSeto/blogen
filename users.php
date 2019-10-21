<?php
//start the session
session_start();

if($_SESSION['user_id'] == FALSE) {
    //redirect to login page
    header("location: login.php");
}
require_once "CRUD/userCRUD.php";
// set the variable for the current user
$current_user_id = $_SESSION['user_id'];

//get all the data of the current logged in user from the database
$current_user = get_specific_user($current_user_id);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://kit.fontawesome.com/350377b97e.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand ml-5" style="font-family: 'Knewave', cursive; font-size: x-large"
            href="blogen.php">Blogen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto" style="color: white">
                <li class="nav-item">
                    <a class="nav-link" href="blogen.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="posts.php">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categories.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Users</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-5">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
                        <i class="fas fa-user"></i>Welcome Richard
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                        <a class="dropdown-item" href="settings.php"><i class="fas fa-cog"></i>Setting</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fas fa-user-times"></i>Logout</a>

                </li>
            </ul>
        </div>
    </nav>
    <header id="main-header" class="py-3 bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-white"><i class="fas fa-users"></i>Users</h1>

                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <div class="input-group mt-3">
                    <input type="text" class="form-control" placeholder="Search posts ...">
                    <span class="input-group-btn">
                        <button class="btn btn-warning">
                            <i class="fa fa-search"></i>
                            Search
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <div class="bg-secondary py-3">
                    <h6>Latest Posts</h6>
                </div>
                <table class="table table-striped table-borderless table-hover">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>User Email</th>
                        <th>User Bio</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $display_users = get_users();
                        // loop through all the values in the array
                        foreach($display_users as $key => $row){
                        $user_id = $row['user_id'];
                        echo "<tr>";
                        echo "<td>". $row['user_id']. "</td>";
                        echo "<td>". $row['user_fullname']."</td>";
                        echo "<td>". $row['user_email']."</td>";
                        echo "<td>". $row['user_bio']."</td>";
                        echo "<td>
                        <a href='updateuser.php?user_id=$user_id' class='btn btn-info'>Edit</a>
                        <form method='POST' action='deleteusers.php'>
                            <input type='hidden' name='delete_id' value='$user_id'>
                            <button type='submit' class='btn btn-danger' name='delete'>Delete</button>
                        </form>
                        </td>";
                         echo "</tr>";
                    
                        }
                    ?>
                    </tbody>
                </table>
                <a href="add_user.php"><button type="submit" class="btn btn-primary" name="adduser">add user</button></a>
            </div>
        </div>
    </div>

    <footer id="main-footer" class="text-white mt-5 p-5" style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="lead text-center">Copyright © Blogen Admin UI</p>
                </div>
            </div>
        </div>
    </footer>



</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../js/bootstrap.js"></script>

</html>