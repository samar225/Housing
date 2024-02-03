<?php 
  $output = '';
if (isset($_POST['p_id'])) {

  $db = mysqli_connect("localhost", "root", "", "uni");

  $property_id = $_POST['p_id'];
  $output .='
  <div class="form-group">
  <p >Are you sure ?</p>
  <input type="hidden" name="property_id" value="' . $_POST['p_id']. '">
  <br>
</div>
  ';
}
echo $output;
?>