<?php

include("navbar.php");


?>
<div class="container">
<div class="row justify-content-around ">
  <?php
  $q_string = $_POST['search_property'];
  $sql = "SELECT * FROM add_property where concat(zone,province,city,property_type,country) like '%$q_string%'";
  $query = mysqli_query($db, $sql);
  echo '<center><h1>Searched Properties</h1></center>';
  if (mysqli_num_rows($query) > 0) {
    ?>


      <?php
      while ($rows = mysqli_fetch_assoc($query)) {
        $property_id = $rows['property_id'];


        ?>

        <div class=" d-flex col-xl-4 col-sm-6 justify-content-around">
          <div class="card">
            <?php

        $sql2 = "SELECT * FROM property_photo where property_id='$property_id'";
        $query2 = mysqli_query($db, $sql2);

        if (mysqli_num_rows($query2) > 0) {
          $row = mysqli_fetch_assoc($query2);
          $photo = $row['p_photo'];


              echo '<img class="image" src="owner/' . $photo . '">';
        } ?>

            <h4><b>
                <?php echo $rows['property_type']; ?>
              </b></h4>
            <p>
              <?php echo $rows['city'] ?>
            </p>
            <p>
              <?php echo $rows['description'] ?>
            </p>
            <p>
              <?php echo '<a href="view-property.php?property_id=' . $rows['property_id'] . '"  class="btn btn-lg btn-primary btn-block" >View Property </a><br>'; ?>
            </p><br>
          </div>
        </div>
     


      <?php

      }
  } else {
    echo "<center><h3>Searched Property not found...</h3></center>";
  }
  ?>
 </div>

</div>
<?php 
include("footer.php");


?>