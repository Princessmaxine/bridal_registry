<?php 
    $title = 'View Record';

require_once 'includes/header.php'; 
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

if(!isset($_GET['id'])){
    include 'includes/errormessage.php';

}else{
    $id = $_GET['id'];
    $result = $crud->getInviteeDetails($id);
   
?>
<img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path']; ?>" style="width: 50%; height: 60%"/>

<div class="card" style="width: 18rem;">
    <div class="card-body">

      <h5 class="card-title">
    <?php echo $result['firstname'] . ' ' . $result['lastname']; ?>
</h5>
        <p class="class-text">
           Email Adress: <?php echo $result['emailaddress']; ?>
</p>
       <p class="class-text">
            Contact Number: <?php echo $result['contactnumber']; ?>
</p>
        <h6 class="card-subtitle mb-6 text-muted">
        <?php echo $result['name']; ?>
</h6>

        <p class="card-text">
            Address: <?php echo $result['address']; ?>
        </p>


        <p class="card-text">
            City: <?php echo $result['city']; ?>
        </p>

        <p class="card-text">
          Parish: <?php echo $result['parish']; ?>
        </p>

        <p class="card-text">
            Country: <?php echo $result['country']; ?>
        </p>
            
    </div>
</div>
    </br>

        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <a href="edit.php?id=<?php echo $result['invitee_id'] ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Do you really want to delete this Record?');" 
         href="delete.php?id=<?php echo $result['invitee_id'] ?>" class="btn btn-danger">Delete</a> 
<?php }?>






<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>
