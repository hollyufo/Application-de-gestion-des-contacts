<?php
include('./controllers/contacts.php');
$contact = new contact;
$contact->id = 1;
$list = $contact->find_user($contact->id);
var_dump($list);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <?php
           echo'
           <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Full name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">'.$list['contactid'].'</th>
                    <td>'.$list['fullname'].'</td>
                    <td>'.$list['phone'].'</td>
                    <td>'.$list['email'].'</td>
                    <td>'.$list['address'].'</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>test</td>
                </tr>
            </tbody>
            </table> '?>
</body>
</html>