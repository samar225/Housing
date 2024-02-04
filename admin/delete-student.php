<?php 
  $output = '';
if (isset($_POST['user_id'])) {

  $db = mysqli_connect("localhost", "root", "", "uni");

  $user_id = $_POST['user_id'];
  $output .='
  <div class="form-group">
  <p > Are you sure ?</p>
  <input type="hidden" name="user_id" value="' . $user_id. '">
  <br>
</div>
  ';
}
echo $output;
?>