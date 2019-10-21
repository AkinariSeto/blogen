<?php
// start the session
session_start();

// remove all sesion variables
session_destroy();

// redirect to login page
header('location: login.php');

?>