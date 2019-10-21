<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
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
                        <a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i>Profile</a>
                        <a class="dropdown-item" href="settings.php"><i class="fas fa-cog"></i>Setting</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fas fa-user-times"></i>Logout</a>

                </li>
            </ul>
        </div>
    </nav>
    <header id="main-header" class="py-3 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-white"><i class="fas fa-user-alt"></i>Profile</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- ACTIONS -->
    <section id="actions" class="py-4 mb-4 bg-faded">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mr-auto">
                    <a href="blogen.php" class="btn btn-secondary btn-block"><i
                            class="fas fa-arrow-left"></i>Back To
                        Dashboard</a>

                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#passwordModal"><i
                            class="fa-lock"></i>Change Password</a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-danger btn-block"><i class="fa fa-trash"></i>Delete Account</a>
                </div>
            </div>
        </div>
    </section>
    <!-- POST EDIT -->
    <section id="edit-post">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-block">
                        <form>
                            <div class="form-group">
                                <label for="name" class="form-control-label">Name</label>
                                <input type="text" id="name" class="form-control" value="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input type="email" id="email" class="form-control" value="jdoe@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="body">Bio</label>
                                <br>
                                <textarea name="editor1" id="body" cols="60" rows="3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed eius sunt impedit tempore blanditiis voluptate pariatur dicta magni mollitia? Debitis ab facilis perferendis consectetur obcaecati repellendus iure. Facere, tempora ad?
                        </textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                        <h3>Your Avatar</h3>
                        <img src="../img/cosupure.jpg" alt="avatar" class="img-fluid d-block mb-3" style="width: 260px;
                        height: 250px; object-fit: cover;">
                        <button class="btn btn-primary btn-block">
                            <i class="fa fa-pencil">
                            </i>
                            " Edit Image"
                        </button>
                        <button class="btn btn-danger btn-block">
                            <i class="fa fa-remove">
                            </i>
                            " Delete Image"
                        </button>
                    </div>
            </div>
            
        </div>
    </section>
  


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