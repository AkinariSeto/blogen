<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
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

    <header id="main-header" class="py-3 bg-danger">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-white"><i class="fa fa-plus"></i>Add User</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- POST -->
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container">
                                <form class="my-5" method="POST">
                                    <div class="form-group">
                                        <label for="user" class="form-control-label">Name</label>
                                        <input type="user" id="user" class="form-control" name="user_fullname">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <input type="email" id="email" class="form-control" name="user_email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="form-control-label">Password</label>
                                        <input type="password" id="password" class="form-control" name="user_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password" class="form-control-label">Confirm
                                            password</label>
                                        <input type="password" id="confirm_password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="bio" class="form-control-label">Bio</label>
                                        <br>
                                        <textarea type="text" name="user_bio" id="bio" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-success btn-block" type="submit" name="register">Add
                                        User</button>
                                </form>
                                <?php
                                    if(isset($_POST['register'])){
                                        $userfullname = $_POST['user_fullname'];
                                        $useremail = $_POST['user_email'];
                                        $userpassword = $_POST['user_password'];
                                        $userbio = $_POST['user_bio'];
                                        session_start();
                                        require 'CRUD/userCRUD.php';

                                        //call the function to login
                                        $result = save_user($userfullname, $useremail, $userpassword,$userbio);
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