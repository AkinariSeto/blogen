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
    <title>Add Post</title>
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
                        <a class="dropdown-item" href="profile.php"><i
                                class="fas fa-user-circle"></i>Profile</a>
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
                    <h1 class="text-white"><i class="fa fa-plus"></i>Add Post</h1>
                </div>
            </div>
        </div>
    </header>
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container">
                                <form class="my-5" method="POST">
                                    <div class="form-group">
                                        <label for="title" class="form-control-label">Title</label>
                                        <input type="title" id="title" class="form-control" name="post_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="post" class="form-control-label">Category</label>
                                        <select id="post" class="form-control" name="post_category">
                                        <?php
                                            require_once "CRUD/categoryCRUD.php";
                                            $categories = get_categories();
                                            foreach($categories as $key => $row) {
                                                $category_id = $row['category_id'];
                                                $categoryname = $row['category_name'];
                                                echo "<option value='$category_id'>$categoryname</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group bg-faded p-3">
                                        <label for="file">Image Upload</label>
                                        <input type="file" id="file" class="form-control-file" name="image_upload">
                                        <small id="fileHelp" class="form-text text-muted">Max Size 3MB</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Body</label><br>
                                        <textarea name="post_body" cols="60" rows="3" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-block" name="save">Post</button>
                                </form>
                                <?php
                                    if(isset($_POST['save'])){
                                        $posttitle = $_POST['post_title'];
                                        $postbody = $_POST['post_body'];
                                        $postcategory = $_POST['post_category'];


                                        session_start();
                                        require 'CRUD/postCRUD.php';

                                        //call the function to login
                                        $result = save_post($posttitle, $postbody, $postcategory, $current_user_id);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="../js/bootstrap.js"></script>

</html>