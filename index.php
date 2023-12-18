<?php 
    $title = 'Index';

require_once 'includes/header.php'; 
require_once 'db/conn.php';

$results = $crud->getgenders();
?>
<!--
    First name
    Last name
    Email address
    Contact Number
    Gender (Male, Female and Other)
    Adddress 
    City
    Parish
    Country

--->

<h1 class="text-center"> Gift Registry</h1>

<form method="post" action="success.php">

<div class="form-group">
  <label for="firstname">First Name</label>
    <input required type="text" class="form-control" 
    id="firstname" name="firstname">
</div>

<div class="form-group">
  <label for="lastname">Last Name</label>
    <input required type="text" class="form-control" 
    id="lastname" name="lastname">
</div>

<div class="form-group">
    <label for="email">Email Address</label>
    <input required type="email" class="form-control" 
    id="email" name="email"aria-describedby="emailHelp" >
 </div>

<div class="form-group">
    <label for="phone">Contact Number</label>
    <input type="text" class="form-control" 
    id="phone" name="phone"aria-describedby="phoneHelp" >
  </div>

<div class="form-group">
    <label for="gender">Gender</label>
    <select calss="form-control" id="gender" name="gender">
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
        <option value="<?php echo $r['gender_id']?>">
        <?php echo $r['name']; ?></option>
        <?php }?>
      </select>
  </div>



<div class="form-row">
    <div class="form-group col-md-8">
<label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="
    inputAddress" accept=""name="address" 
    placeholder="Enter street name and number">
  </div>

    <br>

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" 
      id="inputCity" name="city">
    </div>

    <div class="form-group col-md-4">
      <label for="inputParish">Parish</label>
      <input type="text" class="form-control" 
      id="inputParish" name="parish">
       </div>

    <div class="form-group col-md-4">
      <label for="inputCountry">Country</label>
      <input required type="text" class="form-control" 
      id="inputCountry" name="country">
        </div>
    <br>
    <br>
    <br>
    <div class="custom-file">
       <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
    <label class="custom-file-label" for="avatar">Choose a Photo</label>
    <small id="avatar" class="form-text text-dark">Photo Upload is Optional</small>
    
</div>
<br>
<br>
<br>
<br>
  <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
</form>

<br>


<?php require_once 'includes/footer.php'; ?>

