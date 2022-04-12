<?php
include('./controllers/user.php');
// logging user out 
$user = new User();
$user->logout();