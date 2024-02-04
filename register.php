<?php

include("navbar.php");
include("account-engine.php");
?>


<div class="container">
  <h3 style="font-weight: bold; text-align: center;"> Register</h3>

  <hr> <br>
  <form method="POST" action="" enctype="multipart/form-data">

    <style>
      .form-group {
        margin-bottom: 1rem;
      }
    </style>

    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="form-group">
          <label for="role">Full Name:</label>
          <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name"
            required>
        </div>

        <div class="form-group">
          <label for="id_type">Gender:</label>
          <select class="form-control" name="gender"  required>
          <option value="">--Select Male/Female--</option>  
          <option value="male">Male</option>
            <option value="female">Female</option>
            
          </select>
        </div>

        <div class="form-group">
          <label for="id_type">Role:</label>
          <select class="form-control" name="role"  required>
          <option value="">--Select Province/State--</option>  
          <option value="student">Student</option>
            <option value="owner">Owner</option>
            <option value="admin">Admin</option>
          </select>
        </div>


        <div class="form-group">
          <span id="check-email"></span>
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required
            onInput="checkEmail()">
        </div>
        <div class="form-group">
          <label for="password1">Password:</label>
          <input type="password" class="form-control" id="password1" placeholder="Enter Password" name="password"
            required>
        </div>
        <div class="form-group">
          <label for="password2">Confirm Password:</label>
          <input type="password" class="form-control" id="password2" placeholder="Enter Password Again" required>
        </div>

      </div>


      <div class="col-md-6 mb-4">
        <div class="form-group">
          <label for="phone_no">Phone No.:</label>
          <input type="text" class="form-control" id="phone_no" placeholder="Enter Phone No." name="phone_no" required>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" required>
        </div>
        <div class="form-group">
          <label for="id_type">Type of ID:</label>
          <select class="form-control" name="id_type" required>
            <option>Citizenship</option>
            <option>Driving Licence</option>
          </select>
        </div>
        <div class="form-group">
          <label for="card_photo">Upload your Selected Card:</label>
          <input type="file" class="form-control" placeholder="card_photo" name="id_photo" accept="images/id_photo/*" required>
        </div>


        <div class="form-group">
          <label for="card_photo">Upload your Profile Picture:</label>
          <input type="file" class="form-control" placeholder="Profile Picture" name="profile_photo" accept="images/profile_photo/*"
            required>
        </div>

      </div>

      <hr>
      <center><button id="submit" name="register" class="btn btn-primary btn-block"
          onclick="return Validate()">Register</button></center><br>
      <div class="form-group text-right">
        <label class="">Register as a <a href="login.php">Have an Account?</a>?</label><br>
      </div><br><br>
      </div>
  </form>
</div>



<script type="text/javascript">
  function Validate() {
    var password = document.getElementById("password1").value;
    var confirmPassword = document.getElementById("password2").value;
    if (password != confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }
    return true;
  }
</script>
<script>
  function checkEmail() {

    jQuery.ajax({
      url: "account-engine.php",
      data: 'email=' + $("#email").val(),
      type: "POST",
      success: function (data) {
        $("#check-email").html(data);
      },
      error: function () { }
    });
  }
</script>