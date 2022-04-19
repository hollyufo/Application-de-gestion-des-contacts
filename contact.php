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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if(isset($_GET['deleted'])){
                    echo '<div class="alert alert-danger" role="alert">
                    Contact deleted successfully!
                  </div>';
                }
                if(isset($_GET['added'])){
                    echo '<div class="alert alert-success" role="alert">
                    Contact added successfully!
                  </div>';
                }
                    $d_contact = new contact;
                    $datas = $d_contact->show();
                ?>
                <?php 
                    if (isset($_POST['submit'])) {
                        $d_contact->fullname = $_POST['fullname'];
                        $d_contact->phone = $_POST['phone'];
                        $d_contact->email = $_POST['email'];
                        $d_contact->address = $_POST['address'];
                        $d_contact->user_id = $_SESSION['id'];
                        $d_contact->add();
                    }
                ?>
            </tbody>
            </table>              
          </div>

      </div>


      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Full name</label>
                                    <input type="text" name="fullname" class="form-control" id="email" placeholder="Full Name">
                                </div>
                                <div class="mb-3">
                                    <label for="Phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="email@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="Address" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" id="Address" placeholder="Address">
                                </div>
                                <div class="mb-3">
                                    <button name='submit' value="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>        
