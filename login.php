<?php 
    include('./controllers/user.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Document</title>
</head>
<body class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Contact List</a>
            <a href="./login.php" class="btn btn-dark d-flex">Login</a>
        </div>
      </nav>
      <div class="">
        <div class="login">
            <h2 class="tlogin">Authenticate</h2>
            <?php
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger" role="alert">
                            User does not exist!
                        </div>';
                }
                if (isset($_GET['password'])) {
                    echo '<div class="alert alert-danger" role="alert">
                            Your password is not correct!
                        </div>';
                }
            ?>
            <form id="loginform" action="" method="POST">
                <?php 
                // log in
                if(isset($_POST['login'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $user = new User();
                    $user->username = $username;
                    $user->password = $password;
                    $user->login();
                }
                ?>
                <div class="sec">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                    <p id="usernameError" class="invalid-feedback small"></p>    
                </div>
                <div class="sec">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
                    <p id="passwordError" class="invalid-feedback small"></p>       
                </div>
                <div class="sec">
                    <input class="btn btn-sepcial" type="submit" value="Login" name="login">
                </div>     
            </form>
            <p class="s13">No account? <a href="./signup.php">Sign up</a> here.</p>
        </div>
      </div>
    <script src="./assets/js/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>