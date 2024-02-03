<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("location:../index.php");
}

include("navbar.php");
include("engine.php");

?>

<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>


  <ul class="nav nav-pills d-flex align-items-center justify-content-around  mb-3" id="pills-tab" role="tablist">

    <li class="nav-item" role="presentation">
      <button class="nav-link menu active " id="pills-menu1-tab" data-bs-toggle="pill" data-bs-target="#menu1"
        type="button" role="tab" aria-controls="pills-menu1" aria-selected="true">View Properties</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link menu" id="pills-menu2-tab" data-bs-toggle="pill" data-bs-target="#menu2" type="button"
        role="tab" aria-controls="pills-menu2" aria-selected="false">Owner Details</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link menu" id="pills-menu3-tab" data-bs-toggle="pill" data-bs-target="#menu3" type="button"
        role="tab" aria-controls="pills-menu3" aria-selected="false">Students Details</button>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link menu" id="pills-menu4-tab" data-bs-toggle="pill" href="#menu4" type="button" role="tab"
        aria-controls="pills-menu4" aria-selected="false">Booked Properties</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link menu" id="pills-menu5-tab" data-bs-toggle="pill" href="#menu5" type="button" role="tab"
        aria-controls="pills-menu5" aria-selected="false">Approve Properties</a>
    </li>

  </ul>


  <div class="tab-content   d-flex align-items-center justify-content-around" id="pills-tabContent">


    <div class="tab-pane container justify-content-around fade  show in active" id="menu1" role="tabpanel"
      aria-labelledby="pills-menu1-tab">
      <center>
        <h3>View Live Property</h3>
      </center>
      <div class="container ">
        <input type="text" id="myInput" onkeyup="searchFunction1()" placeholder="Enter location to search house."
          title="Type in a name">
        <div class="a" style=" overflow-x:auto">
          <table class="myTable" id="myTable">
            <tr class="">
              <th>Approved</th>
              <th>Province</th>
              <th>Zone</th>
              <th>City</th>
              <th>Phone Number</th>
              <th>Property Type</th>
              <th>Estmated Price</th>
              <th>Booked</th>

              <th>Photos</th>
              <th>Details</th>

              <th>Delelet</th>

            </tr>
            <?php

            $sql = "SELECT * from add_property where `approved`='Yes'";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($rows = mysqli_fetch_assoc($result)) {

                ?>
                <tr>

                <td>
                    <?php
                    if ($rows['approved'] == "Yes") { ?>

                      <i class="bi bi-check-circle-fill" style="color:green"></i><span class="ms-1">
                        <?php echo " ", $rows['approved'] ?>
                      </span>
                      <?php
                    } else { ?>
                      <i class="bi bi-check-circle-fill" style="color:red"></i><span class="ms-1">
                        <?php echo " ", $rows['approved'] ?>
                      </span>
                    <?php } ?>

                  </td>
                  <td>
                    <?php echo $rows['province'] ?>
                  </td>
                  <td>
                    <?php echo $rows['zone'] ?>
                  </td>
                  <td>
                    <?php echo $rows['city'] ?>
                  </td>


                  <td>
                    <?php echo $rows['contact_no'] ?>
                  </td>
                  <td>
                    <?php echo $rows['property_type'] ?>
                  </td>

                  <td>
                    <?php echo $rows['estimated_price'] ?>
                    SYL.
                  </td>
                  <td>
                    <?php
                    if ($rows['booked'] == "Yes") { ?>

                      <i class="fa fa-check-circle-o green" style="color:green"></i><span class="ms-1">
                        <?php echo " ", $rows['booked'] ?>
                      </span>
                      <?php
                    } else { ?>
                      <i class="fa fa-check-circle-o green" style="color:red"></i><span class="ms-1">
                        <?php echo " ", $rows['booked'] ?>
                      </span>
                    <?php } ?>

                  </td>

                  <td>
                    <?php $property_id = $rows['property_id'] ?>
                    <?php $sql2 = "SELECT * from property_photo where property_id='$property_id'";
                    $query = mysqli_query($db, $sql2);

                    if (mysqli_num_rows($query) > 0) {
                      while ($row = mysqli_fetch_assoc($query)) { ?>
                        <img src="<?php echo $row['p_photo'] ?>" width="50px">

                        <br>

                        <?php
                      }
                    } ?>
                  </td>
                  <td>
                    <!--   -->
                    <form method="GET">
                      <a href='<?php echo 'view-property.php?property_id=', $rows["property_id"] ?>'
                        class=" btn-primary  ">View</button>
                    </form>
                  </td>


                  <td>
                    <a id='<?php echo $rows["property_id"] ?>' class=" btn-danger deletePbtn">Delete</a>
                  </td>

                </tr>

                <?php
              }
            }
            ?>

          </table>
        </div>
      </div>

      <!-- Delete Modal -->

      <div class="modal fade" id="deleteproperty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <form method="POST">
              <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirme deletion!</h4>
              </div>

              <div class="modal-body">


              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <input type="submit" class="btn btn-danger" name="delete_property">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>





    <div class="  tab-pane container fade in" id="menu2" role="tabpanel" aria-labelledby="pills-menu2-tab">
      <center>
        <h3>Owner Details</h3>
      </center>
      <div class="container">
        <input type="text" id="myInput2" onkeyup="searchFunction2()" placeholder="Search..."
          title="Type in a name">
        <div style="overflow-x:auto;">
          <table class="myTable" id="myTable2">
            <tr class="table-header">
              <th>Id.</th>
              <th>Delete</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone No.</th>
              <th>Address</th>
              <th>Type of Id</th>
              <th>Id Photo</th>
            </tr>
            <?php

            $sql = "SELECT * from user where role = 'owner'";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($rows = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                  <td>
                    <?php echo $rows['user_id'] ?>
                  </td>
                  <td>
                    <a style=" cursor: pointer;" id='<?php echo $rows["user_id"] ?>' class="btn-danger deleteOwnerbtn">Delete</a>
                    
                  </td>
                  <td>
                    <?php echo $rows['full_name'] ?>
                  </td>
                  <td>
                    <?php echo $rows['email'] ?>
                  </td>
                  <td>
                    <?php echo $rows['phone_no'] ?>
                  </td>
                  <td>
                    <?php echo $rows['address'] ?>
                  </td>
                  <td>
                    <?php echo $rows['id_type'] ?>
                  </td>
                  <td><img id="myImg" src="<?php echo $rows['id_photo'] ?>" width="50px"></td>
                  <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                  </div>
                </tr>

              <?php }
            } ?>
          </table>
        </div>
      </div>
      <!-- Delete owner Modal -->

      <div class="modal fade" id="deleteowner" tabindex="-1" data-backdrop="false" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <form method="POST" >
              <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirme deletion!</h4>
              </div>

              <div class="modal-body">

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <input type="submit" class="btn btn-danger" name="delete_owner">
              </div>
            </form>
          </div>
        </div>

      </div>

    </div>


    <div class="tab-pane container fade in" id="menu3" role="tabpanel" aria-labelledby="pills-menu3-tab">
      <center>
        <h3>Students Details</h3>
      </center>
      <div class="container ">
        <input type="text" id="myInput3" onkeyup="searchFunction3()" placeholder="Search..."
          title="Type in a name">
        <div class="a" style=" overflow-x:auto">
          <table class="myTable" id="myTable3">
            <tr class="table-header">
              <th>Id</th>
              <th> Delete </th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone No.</th>
              <th>Address</th>
              <th>Type of Id</th>
              <th>Id Photo</th>
            </tr>

            <?php



            $sql = "SELECT * from user where role = 'student'";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($rows = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                  <td>
                    <?php echo $rows['user_id'] ?>
                  </td>
                  <td>
                    <a style=" cursor: pointer;" id='<?php echo $rows["user_id"] ?>' class=" btn-danger deletebtn">Delete</a>
                  </td>
                  <td>
                    <?php echo $rows['full_name'] ?>
                  </td>
                  <td>
                    <?php echo $rows['email'] ?>
                  </td>
                  <td>
                    <?php echo $rows['phone_no'] ?>
                  </td>
                  <td>
                    <?php echo $rows['address'] ?>
                  </td>
                  <td>
                    <?php echo $rows['id_type'] ?>
                  </td>
                  <td><img id="myImg2" src="<?php echo $rows['id_photo'] ?>" width="50px"></td>

                  <div id="myModal2" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img02">
                    <div id="caption2"></div>
                  </div>

                </tr>


                <?php
              }
            } ?>
          </table>

        </div>

      </div>

      <!-- Delete student Modal -->

      <div class="modal fade" id="deletestudent" tabindex="-1" role="dialog" data-backdrop="false">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <form method="POST" >
              <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirme deletion!</h4>
              </div>

              <div class="modal-body">

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                <input type="submit" class="btn btn-danger" name="delete_student">
              </div>
            </form>
          </div>
        </div>


      </div>


    </div>

    <div class="tab-pane container fade in" id="menu4" role="tabpanel" aria-labelledby="pills-menu4-tab">
      <center>
        <h3>Booked Property</h3>
      </center>
      <div class="container">
        <input type="text" id="myInput4" onkeyup="searchFunction4()" placeholder="Search..." title="Type in a name">
        <div class="a" style=" overflow-x:auto">
          <table class="myTable" id="myTable4">
            <tr class="table-header">
              <th>Booked Id</th>
              <th>Booked By</th>
              <th>Booker Phone</th>
              <th>Property Province</th>

              <th>Property Zone</th>

              <th>Property Owner</th>
              <th>Owner Phone</th>
            </tr>

            <?php

            $sql = "SELECT * from booking";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($rows = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                <td>
                        <?php echo $rows['booking_id']; ?>
                      </td>

                  <?php
                  $user_id = $rows['user_id'];
                  $property_id = $rows['property_id'];
                  $sql1 = "SELECT * from user where user_id='$user_id'";
                  $result1 = mysqli_query($db, $sql1);

                  if (mysqli_num_rows($result1) > 0) {
                    while ($row = mysqli_fetch_assoc($result1)) {

                      ?>


                      <td>
                        <?php echo $row['full_name']; ?>
                      </td>
                      <td>
                        <?php echo $row['phone_no']; ?>
                      </td>
                      <?php
                      $sql2 = "SELECT * from add_property where property_id='$property_id'";
                      $result2 = mysqli_query($db, $sql2);

                      if (mysqli_num_rows($result2) > 0) {
                        while ($ro = mysqli_fetch_assoc($result2)) {

                          ?>


                          <td>
                            <?php echo $ro['province']; ?>
                          </td>

                          <td>
                            <?php echo $ro['zone']; ?>
                          </td>

                          <?php
                          $owner_id = $ro['owner_id'];
                          $sql3 = "SELECT * from user where user_id='$owner_id'";
                          $result3 = mysqli_query($db, $sql3);

                          if (mysqli_num_rows($result3) > 0) {
                            while ($rowss = mysqli_fetch_assoc($result3)) {

                              ?>
                              <td>
                                <?php echo $rowss['full_name']; ?>
                              </td>
                              <td>
                                <?php echo $rowss['phone_no']; ?>
                              </td>
                            </tr>
                          <?php }
                          }
                        }
                      }
                    }
                  }
              }
            } ?>
          </table>
        </div>
      </div>
    </div>

    <div class="tab-pane container justify-content-around fade   in " id="menu5" role="tabpanel"
      aria-labelledby="pills-menu5-tab">
      <center>
        <h3>Approve Property</h3>
      </center>
      <div class="container ">

        <div class="a" style=" overflow-x:auto">
          <table class="myTable" id="myTable">
            <tr class="">
              <th>Approve</th>
              <th>Province</th>
              <th>Zone</th>
              <th>City</th>
              <th>Phone Number</th>
              <th>Property Type</th>
              <th>Estmated Price</th>
             <!-- <th>Booked</th>-->

              <th>Photos</th>
              <th>Details</th>


              <th>Action</th>
            </tr>
            <?php

            $sql = "SELECT * from add_property where approved='No'";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($rows = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                <td>
                    <?php
                    if ($rows['approved'] == "Yes") { ?>

                      <i class="bi bi-check-circle-fill" style="color:green"></i><span class="ms-1">
                        <?php echo " ", $rows['approved'] ?>
                      </span>
                      <?php
                    } else { ?>
                      <i class="bi bi-check-circle-fill" style="color:red"></i><span class="ms-1">
                        <?php echo " ", $rows['approved'] ?>
                      </span>
                    <?php } ?>

                  </td>
                  <td>
                    <?php echo $rows['province'] ?>
                  </td>

                  <td>
                    <?php echo $rows['zone'] ?>
                  </td>
                  <td>
                    <?php echo $rows['city'] ?>
                  </td>


                  <td>
                    <?php echo $rows['contact_no'] ?>
                  </td>
                  <td>
                    <?php echo $rows['property_type'] ?>
                  </td>

                  <td>
                    <?php echo $rows['estimated_price'] ?>
                    SYL.
                  </td>
                 <!-- <td>
                    <?php
                    if ($rows['booked'] == "Yes") { ?>

                      <i class="bi bi-check-circle-fill" style="color:green"></i><span class="ms-1">
                        <?php echo " ", $rows['booked'] ?>
                      </span>
                      <?php
                    } else { ?>
                      <i class="bi bi-check-circle-fill" style="color:red"></i><span class="ms-1">
                        <?php echo " ", $rows['booked'] ?>
                      </span>
                    <?php } ?>

                  </td>-->

                  <td>
                    <?php $property_id = $rows['property_id'] ?>
                    <?php $sql2 = "SELECT * from property_photo where property_id='$property_id'";
                    $query = mysqli_query($db, $sql2);

                    if (mysqli_num_rows($query) > 0) {
                      while ($row = mysqli_fetch_assoc($query)) { ?>
                        <img src="<?php echo $row['p_photo'] ?>" width="50px">

                        <br>

                        <?php
                      }
                    } ?>
                  </td>
                  <td>
                    <!--   -->
                    <form method="GET">
                      <a style=" cursor: pointer;" href='<?php echo 'view-property.php?property_id=', $rows["property_id"] ?>'
                        class=" btn-primary  ">View</button>
                    </form>
                  </td>

                  <td>
                    <!--   Button trigger modal-->
                    <a style=" cursor: pointer;" id='<?php echo $rows["property_id"] ?>' class=" btn-secondary  approvebtn"
                      data-bs-toggle="modal" data-bs-target="#approveModal">Aprrove?</a>
                  </td>

                </tr>


              <?php }
            } ?>
          </table>
          <!-- approve Modal-->
          <div class="modal fade" id="approveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">

            <div class="modal-dialog" style="max-width: 60%;" role="document">
              <form method="POST" enctype="multipart/form-data">
                <div class="modal-content modal-dialog-scrollable">
                  <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLongTitle">Approve Property </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">



                  </div>
                  <div class="modal-footer">
                    <a class=" btn-secondary" data-bs-dismiss="modal">Close</a>

                    <input type="submit" class=" btn-primary " name="approve_property">
                  </div>

                </div>


              </form>
            </div>
          </div>

        </div>
      </div>

    </div>


  </div>







  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
      modal.style.display = "none";
    }
  </script>

  <script>
    // Get the modal
    var modal2 = document.getElementById("myModal2");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img2 = document.getElementById("myImg2");
    var modalImg2 = document.getElementById("img02");
    var captionText2 = document.getElementById("caption2");
    img2.onclick = function () {
      modal2.style.display = "block";
      modalImg2.src = this.src;
      captionText2.innerHTML = this.alt;
    }
    var span2 = document.getElementsByClassName("close")[1];
    span2.onclick = function () {
      modal2.style.display = "none";
    }
  </script>


  <!-- ///////////////// -->


  <script>
    $(document).ready(function () {
      $('.deletebtn').click(function () {
        id_student = $(this).attr('id')

        $.ajax({
          url: "admin/delete-student.php",
          method: 'POST',
          data: { user_id: id_student },
          success: function (result) {
            $(".modal-body").html(result);
          }
        });


        $('#deletestudent').modal("show");
      })
    })

  </script>

  <script>
    $(document).ready(function () {
      $('.deleteOwnerbtn').click(function () {
        id_Owner = $(this).attr('id')

        $.ajax({
          url: "admin/delete-owner.php",
          method: 'POST',
          data: { user_id: id_Owner },
          success: function (result) {
            $(".modal-body").html(result);
          }
        });

        $('#deleteowner').modal("show");

      })
    })

  </script>

  <script>
    $(document).ready(function () {
      $('.deletePbtn').click(function () {
        id_property = $(this).attr('id')

        $.ajax({
          url: "admin/deleteProperty.php",
          method: 'POST',
          data: { p_id: id_property },
          success: function (result) {
            $(".modal-body").html(result);
          }
        });


        $('#deleteproperty').modal("show");
      })
    })

  </script>


  <!-- ///// SEARCH FUNCTIONS ////// -->
  <script>
    function searchFunction1() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      th = table.getElementsByTagName("th");
      for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        for (var j = 0; j < th.length; j++) {
          td = tr[i].getElementsByTagName("td")[j];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
              tr[i].style.display = "";
              break;
            }
          }
        }
      }
    }
  </script>

  <script>
    function searchFunction2() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput2");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable2");
      tr = table.getElementsByTagName("tr");
      th = table.getElementsByTagName("th");
      for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        for (var j = 0; j < th.length; j++) {
          td = tr[i].getElementsByTagName("td")[j];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
              tr[i].style.display = "";
              break;
            }
          }
        }
      }
    }
  </script>

  <script>
    function searchFunction3() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput3");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable3");
      tr = table.getElementsByTagName("tr");
      th = table.getElementsByTagName("th");
      for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        for (var j = 0; j < th.length; j++) {
          td = tr[i].getElementsByTagName("td")[j];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
              tr[i].style.display = "";
              break;
            }
          }
        }
      }
    }
  </script>
  <script>
    function searchFunction4() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput4");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable4");
      tr = table.getElementsByTagName("tr");
      th = table.getElementsByTagName("th");
      for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        for (var j = 0; j < th.length; j++) {
          td = tr[i].getElementsByTagName("td")[j];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
              tr[i].style.display = "";
              break;
            }
          }
        }
      }
    }
  </script>
  <script>
    $(document).ready(function () {
      $('.approvebtn').click(function () {
        id_property = $(this).attr('id')

        $.ajax({
          url: "admin/approve.php",
          method: 'post',
          data: { p_id: id_property },
          success: function (result) {
            $(".modal-body").html(result);
          }
        });


        $('#approveModal').modal("show");
      })
    })

  </script>
  <br>
  <?php include("footer.php");

  ?>