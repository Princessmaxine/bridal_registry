<?php 
    $title = 'Edit Record';

require_once 'includes/header.php'; 
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

$results = $crud->getgenders();

if (!isset($_GET['id']))
{
   
    include 'includes/errormessage.php';
    header('Location: viewrecords.php');
}
else{
    $id = $_GET('id');
    $invitee = $crud->getInviteeDetails($id);

?>

<h1 class="text-center">Edit Record</h1>

<form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php 
    echo $invitee['invitee_id'] ?>" />

<div class="form-group">
  <label for="firstname">First Name</label>
    <input type="text" class="form-control" value="<?php 
    echo $invitee['firstname'] ?>"id="firstname" name="firstname">
</div>

<div class="form-group">
  <label for="lastname">Last Name</label>
    <input type="text" class="form-control" value="<?php 
    echo $invitee['lastname']?> "id="lastname" name="lastname">
</div>

<div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" value="<?php 
    echo $invitee['emailaddress']?> "id="email" 
    name="emailaddress" aria-describedby="emailHelp" >    
</div>


<div class="form-group">
    <label for="phone">Contact Number</label>
    <input  type="text" class="form-control"value="<?php 
    echo $invitee['contactnumber']?>"id="phone" 
    name="phone" aria-describedby="phoneHelp" >     
</div>


<div class="form-group">
    <label for="gender">Gender</label>
    <select class ="form control" id="gender" name="gender">
     <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
    <option value="<?php echo $r['gender_id'] ?>" <?php 
    if($r['gender_id']== $invitee['gender_id']) echo 'selected'?>> 
    <?php echo $r['name']; ?> 
    </option>
     <?php }?>
 </select>
</div>

<br/>

<div class="form-row">
    <div class="form-group col-md-8">
<label for="inputAddress">Address</label>
    <input type="text" class="form-control" value="<?php 
    echo $invitee['address']?> "id="inputAddress" 
    name="address" placeholder="Enter street name and number">
  </div>

    <br>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputCity">City</label>
      <input type="text" class="form-control"value="<?php 
      echo $invitee['city']?> "id="inputCity" name="city">
    </div>

    <div class="form-group col-md-4">
      <label for="inputParish">Parish</label>
      <input type="text" class="form-control" value="<?php 
      echo $invitee['parish']?> "id="inputParish" name="parish">
       </div>

    <div class="form-group col-md-4">
      <label for="inputCountry">Country</label>
      <input type="text" class="form-control" value="<?php 
      echo $invitee['country']?> "id="inputCountry" name="country">
        </div>
    <br>

  <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
  <a href="viewrecords.php" class="btn btn-info">Back to List</a>
</form>

    <?php } ?>

<br>
<br>
<?php require_once 'includes/footer.php'; ?>

