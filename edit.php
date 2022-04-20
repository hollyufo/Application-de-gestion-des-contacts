<?php
include('./controllers/contacts.php');
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
}
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
          <a class="navbar-brand" href="#">Contacts list</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="profile.php"><?php echo $_SESSION['username'] ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contacts</a>
              </li>
              <li class="nav-item">
                <a href="./logout.php" class="nav-link">Logout</a>
              </li>
            </ul>
            <div class="d-flex">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Contact
                  </button>
            </div>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="mt-5">
        <form id="form-contact" action="" method="POST">
            <?php
                $contact = new contact();
                $contact->id = $_GET['id'];
                $row = $contact->find();
            ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full name</label>
                <input type="text" <?php echo 'value="'.$row['fullname'].'"' ?> name="fullname" class="form-control" id="fullname" placeholder="Full Name">
                <p class="" style="color: red;" id ="usernameerror"></p>
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone</label>
                <input type="tel" <?php echo 'value="'.$row['phone'].'"' ?>class="form-control" name="phone" id="phone" placeholder="Phone">
                <p class="" style="color: red;" id ="phoneerror"></p>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" <?php echo 'value="'.$row['email'].'"' ?> class="form-control" name="email" id="email" placeholder="email@example.com">
                <p class="" style="color: red;" id ="emailerror"></p>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <input type="text" <?php echo 'value="'.$row['address'].'"' ?> class="form-control" name="address" id="address" placeholder="Address">
                <p class="" style="color: red;" id ="addresserror"></p>
            </div>
            <div class="mb-3">
                <button name='submit' value="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
        <?php
          if(isset($_POST['submit'])){
            $contact->fullname = $_POST['fullname'];
            $contact->phone = $_POST['phone'];
            $contact->email = $_POST['email'];
            $contact->address = $_POST['address'];
            $contact->id = $_GET['id'];
            $contact->update();
          }
        ?>
    <script src="./assets/js/editvalidation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>        
