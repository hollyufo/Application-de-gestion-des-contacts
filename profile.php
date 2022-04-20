<?php include('config/db.php') ?>
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
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./profile.php"><?php echo $_SESSION['username'] ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./contact.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./logout.php" >Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="pres">
          <h1>Hello!</h1>
          <div class="container">
            <h1> Welcome, <?php echo $_SESSION['username'] ?> </h1>
            <h2>Profile</h2>
            <div class="d-flex border-bottom border-top p-3">
                <p class="me-4"><strong>Username :</strong></p>
                <p><?php echo $_SESSION['username']?></p>
            </div>
            <div class="d-flex border-bottom p-3">
                <p class="me-4"><strong>Created at :</strong></p>
                <p><?php echo $_SESSION['created_at']?></p>
          </div>
          <div class="d-flex border-bottom p-3">
              <p class="me-4"><strong>Last login :</strong></p>
              <p><?php echo $_SESSION['last_login']?></p>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>