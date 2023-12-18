<?php

require_once 'db/conn.php';

if(isset($_POST['submit'])){
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contact = $_POST['phone'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$city = $_POST['city'];
$parish = $_POST['parish'];
$country = $_POST['country'];

$result = $crud->editInvitee($id, $fname, $lname, $email, $contact, $gender, $address, $city, $parish, $country);
if ($result){
    header("Location: viewrecords.php");
}
else{
    include 'includes/errormessage.php';
   }
}
else{
    include 'includes/errormessage.php';
}


?>