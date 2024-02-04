<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("location:../index.php");
}

include("navbar.php");


?>

<div class=" container justify-content-around fade show in active" id="menu1" role="tabpanel"
      aria-labelledby="pills-menu1-tab" tabindex="0">
      <center>
        <h3>Student Profile</h3>
      </center>

      <?php

      $u_email = $_SESSION["email"];

      $sql = "SELECT * from user where email='$u_email' AND role ='student'";
      $result = mysqli_query($db, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {

          ?>
          <div class="container align-items-center ">

            <div class="card align-items-center">
              <img class="post-img" src="<?php echo $rows['profile_photo']; ?>">
              <h1>
                <?php echo $rows['full_name']; ?>
              </h1>
              <p class="title">
                <?php echo $rows['email']; ?>
              </p>
              <p><b>Phone No.: </b>
                <?php echo $rows['phone_no']; ?>
              </p>
              <p><b>Address: </b>
                <?php echo $rows['address']; ?>
              </p>
              <p><b>Id Type: </b>
                <?php echo $rows['id_type']; ?>
              </p>
              <p><img src="<?php echo $rows['id_photo']; ?>" height="100px"></p>

              <!-- Trigger the modal with a button -->
              <p><a type="button" class=" btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Update
                  Profile</a></p>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Profile</h4>
                  </div>
                  <div class="modal-body">

                    <form method="POST">
                      <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input type="hidden" value="<?php echo $rows['user_id']; ?>" name="user_id">
                        <input type="text" class="form-control" id="full_name" value="<?php echo $rows['full_name']; ?>"
                          name="full_name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $rows['email']; ?>"
                          name="email" readonly>
                      </div>
                      <div class="form-group">
                        <label for="phone_no">Phone No.:</label>
                        <input type="text" class="form-control" id="phone_no" value="<?php echo $rows['phone_no']; ?>"
                          name="phone_no">
                      </div>
                      <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" value="<?php echo $rows['address']; ?>"
                          name="address">
                      </div>
                      <div class="form-group">
                        <label for="id_type">Type of ID:</label>
                        <input type="text" class="form-control" value="<?php echo $rows['id_type']; ?>" name="id_type"
                          readonly>
                      </div>
                      <div class="form-group">
                        <label>Your Id:</label><br>
                        <img src="<?php echo $rows['id_photo']; ?>" id="output_image" / height="100px" readonly>
                      </div>
                      <hr>


                    </form>


                  </div>
                  <div class="modal-footer">
                    <a id="submit" name="owner_update" class=" btn-primary ">Update</a>

                    <a type="button" class=" btn-danger" data-bs-dismiss="modal">Close</a>
                  </div>
                </div>

              </div>
            </div>
          </div>



          <?php
        }
      } ?>

    </div>
<?php 
include("footer.php");


?>