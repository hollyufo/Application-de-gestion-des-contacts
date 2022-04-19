<?php
include('./controllers/contacts.php');
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
}
$d_contact = new contacts();
$de