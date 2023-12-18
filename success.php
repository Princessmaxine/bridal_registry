<?php 
    $title = 'Success';

require_once 'includes/header.php'; 
require_once 'db/conn.php';

if(isset($_POST['submit'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $parish = $_POST['parish'];
    $country = $_POST['country'];
    $country = $_POST['country'];

    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination= "$target_dir$contact.$ext";
    move_uploaded_file($orig_file,$destination);

    $isSuccess = $crud->insertInvitees($firstname, $lastname, $email, $contact,$gender,$address,$city,$parish,$country, 
    $destination);

    if ($isSuccess){
        include 'includes/successmessage.php';

    }
    else{
        include 'includes/errormessage.php';

    }
}

?>

<img src="<?php echo $destination; ?>" style="width: 50%; height: 60%"/>
<div class="card" style="width: 18rem;">
    <div class="card-body">

      <h5 class="card-title">
    <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
</h5>
        <p class="class-text">
           Email Adress: <?php echo $_POST['email']; ?>
</p>
       <p class="class-text">
            Contact Number: <?php echo $_POST['phone']; ?>
</p>
        <h6 class="card-subtitle md-6 text-muted">
            <?php echo $_POST['gender']; ?>
</h6>

        <p class="card-text">
            Address: <?php echo $_POST['address']; ?>
        </p>


        <p class="card-text">
            City: <?php echo $_POST['city']; ?>
        </p>

        <p class="card-text">
          Parish: <?php echo $_POST['parish']; ?>
        </p>

        <p class="card-text">
            Country: <?php echo $_POST['country']; ?>
        </p>
            
    </div>
</div>









<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>