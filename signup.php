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
            <div class="d-flex">
              <a class="btn btn-dark" href="./login.php">Login</a>
            </div>
          
        </div>
      </nav>
      <div class="">
        <div class="login">
            <h2 class="tlogin">Authenticate</h2>
                        <?php 

            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $verifypassword = $_POST['verifypassword'];
                if($password == $verifypassword){
                    $user = new User();
                    $user->username = $username;
                    $user->password = $password;
                    $user->create();
                }else{
                    echo '<div class="alert alert-success" role="alert">
                    Password doesnot match
                    </div>';
                }
            }
            ?>
            <form id="loginform" action="" method="POST">
                <div class="sec">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">    
                    <p class="invalid-feedback" id="usernameError"></p>
                </div>
                <div class="sec">
                    <label for="password">Password</label>
                    <input name="password" type="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">      
                    <p id="passwordError" class="invalid-feedback small"></p> 
                </div>
                <div class="sec">
                  <label for="verifypassword">Verify Password</label>
                  <input type="password" name="verifypassword" id="verifypassword" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">      
                </div>
                <div class="sec">
                    <input class="btn btn-sepcial" type="submit" value="submit" name="submit" onclick="checkUsername();">
                </div>     
            </form>
            <p class="s13">Already have ancount? <a href="./login.php">Login</a> here.</p>
        </div>
      </div>
      <script src="./assets/js/validation2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>


        function checkUsername()
        {
            $.ajax({
                url: "/Application-de-gestion-des-contacts/controllers/user.php?check",
                type: "POST",
                data:{
                    username: $("#username").val(),
                },
                success: function(result){
                    //$("#usernameError").text(result);
                },
                error: function(html){
                    console.log('error');
                },
                complete: function(html){
                    console.log('complet');
                }
            });
        }
    </script>
  </body>
</html>