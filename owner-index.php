<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:../index.php");
}
include("config/config.php");
include("navbar.php");
include("engine.php");

?>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>


    <ul class="nav nav-pills d-flex align-items-center justify-content-around  mb-3" id="pills-tab" role="tablist">

        <li class="nav-item" role="presentation">
            <button class="nav-link menu active " id="pills-menu1-tab" data-bs-toggle="pill" data-bs-target="#menu1" type="button" role="tab" aria-controls="pills-menu1" aria-selected="true">Profile</button>
        </li>
        <!-- <li class="nav-item" role="presentation">
      <button class="nav-link menu" id="pills-menu2-tab" data-bs-toggle="pill" data-bs-target="#menu2" type="button"
        role="tab" aria-controls="pills-menu2" aria-selected="false">Messages</button>
    </li> -->
        <li class="nav-item" role="presentation">
            <button class="nav-link menu" id="pills-menu3-tab" data-bs-toggle="pill" data-bs-target="#menu3" type="button" role="tab" aria-controls="pills-menu3" aria-selected="false">Add Property</button>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link menu" id="pills-menu4-tab" data-bs-toggle="pill" href="#menu4" type="button" role="tab" aria-controls="pills-menu4" aria-selected="false">View Properties </a>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link menu" id="pills-menu5-tab" data-bs-toggle="pill" data-bs-target="#menu5" type="button" role="tab" aria-controls="pills-menu5" aria-selected="false">Booked Properties</button>
        </li>

    </ul>

    <div class=" tab-content   d-flex align-items-center justify-content-around" id="pills-tabContent">

        <div class="tab-pane container justify-content-around fade show in active" id="menu1" role="tabpanel" aria-labelledby="pills-menu1-tab" tabindex="0">
            <center>
                <h3>Owner Profile</h3>
            </center>

            <?php

            $u_email = $_SESSION["email"];

            $sql = "SELECT * from user where email='$u_email' AND role='owner'";
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
                                    <form method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Profile</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="full_name">Full Name:</label>
                                                <input type="hidden" value="<?php echo $rows['user_id']; ?>" name="user_id">
                                                <input type="text" class="form-control" id="full_name" value="<?php echo $rows['full_name']; ?>" name="full_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" value="<?php echo $rows['email']; ?>" name="email" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_no">Phone No.:</label>
                                                <input type="text" class="form-control" id="phone_no" value="<?php echo $rows['phone_no']; ?>" name="phone_no">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address:</label>
                                                <input type="text" class="form-control" id="address" value="<?php echo $rows['address']; ?>" name="address">
                                            </div>
                                            <div class="form-group">
                                                <label for="id_type">Type of ID:</label>
                                                <input type="text" class="form-control" value="<?php echo $rows['id_type']; ?>" name="id_type" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Your Id:</label><br>
                                                <img src="<?php echo $rows['id_photo']; ?>" id="output_image" / height="100px" readonly>
                                            </div>
                                            <hr>





                                        </div>
                                        <div class="modal-footer">
                                            <button id="submit" name="owner_update" class=" btn-primary ">Update</button>

                                            <a type="button" class=" btn-danger" data-bs-dismiss="modal">Close</a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>



            <?php
                }
            } ?>

        </div>

        <div class="tab-pane container justify-content-around fade in" id="menu3" role="tabpanel" aria-labelledby="pills-menu3-tab">


            <center>
                <h3>Add Property</h3>
            </center>
            <div class="container">



                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="country">Country: *</label>
                                <select class="form-control" name="country" required="required">
                                    <option value="">--Select Country--</option>
                                    <option value="Syria">Syria</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="province">Province/State: *</label>
                                <select class="form-control" name="province" required="required">
                                    <option value="">--Select Province/State--</option>
                                    <option value="Damascus">Damascus</option>
                                    <option value="Aleppo">Aleppo</option>
                                    <option value="Latakia">Latakia</option>
                                    <option value="Tartus">Tartus</option>
                                    <option value="Homs">Homs</option>
                                    <option value="Hama">Hama</option>
                                    <option value="Daraa">Daraa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Zone">Zone:</label>
                                <input type="text" class="form-control" id="zone" placeholder="Enter Zone" name="zone">
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
                            </div>


                            <div class="form-group">
                                <label for="contact_no">Phone Number: *</label>
                                <input type="text" class="form-control" id="contact_no" placeholder="Enter Contact No." name="contact_no" required="required">
                            </div>
                            <div class="form-group">
                                <label for="property_type">Property Type : *</label>
                                <select class="form-control" name="property_type" required="required">
                                    <option value="">--Select Property Type--</option>
                                    <option value="Bed">Bed</option>
                                    <option value="Room">Room</option>
                                    <option value="Apartment">Apartment</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="whose">Gender : *</label>
                                <select class="form-control" name="whose" required="required">
                                    <option value="">--Select Male/Female--</option>
                                    <option value="mae">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="estimated_price">Estimated Price:</label>
                                <input type="estimated_price" class="form-control" id="estimated_price" placeholder="Enter Estimated Price" name="estimated_price">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="total_rooms">Total No. of Rooms:</label>
                                <input type="number" class="form-control" id="total_rooms" placeholder="Enter Total No. of Rooms" name="total_rooms">
                            </div>
                            <div class="form-group">
                                <label for="bedroom">No. of Bedroom:</label>
                                <input type="number" class="form-control" id="bedroom" placeholder="Enter No. of Bedroom" name="bedroom">
                            </div>
                            <div class="form-group">
                                <label for="living_room">No. of Living Room:</label>
                                <input type="number" class="form-control" id="living_room" placeholder="Enter No. of Living Room" name="living_room">
                            </div>
                            <div class="form-group">
                                <label for="bathroom">No. of Bathroom/Washroom:</label>
                                <input type="number" class="form-control" id="bathroom" placeholder="Enter No. of Bathroom/Washroom" name="bathroom">
                            </div>
                            <div class="form-group">
                                <label for="description">Full Description:</label>
                                <textarea type="comment" class="form-control" id="description" placeholder="Enter Property Description" name="description"></textarea>
                            </div>
                            <table class="table table-bordered" border="0">
                            </table>
                            <table class="table" id="dynamic_field">
                                <tr>
                                    <div class="form-group">
                                        <label><b>Photos: *</b></label>
                                        <td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list" required accept="owner/product-photo/*" /></td>
                                        <td><a type="button" id="add" name="add" class=" btn-primary ">Add More</a>
                                        </td>
                                    </div>
                                </tr>
                            </table>
                            <br>
                            <div class="form-group">
                                <button type="submit" class=" btn-primary " value="Add Property" name="add_property">Add
                                    Property</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br><br>

            </div>
        </div>


        <div class="tab-pane container justify-content-around fade in" id="menu4" role="tabpanel" aria-labelledby="pills-menu4-tab" tabindex="-990">
            <center>
                <h3>View Property</h3>
            </center>
            <div class="container ">

                <input type="text" id="myInput" onkeyup="viewProperty()" placeholder="Search..." title="Type in a name">
                <div class="a" style=" overflow-x:auto">
                    <table class="myTable" id="myTable">
                        <tr class="">

                            <th>Province</th>
                            <th>Zone</th>
                            <th>City</th>
                            <th>Phone Number</th>
                            <th>Property Type</th>
                            <th>Estimated Price</th>
                            <th>Booked</th>

                            <th>Photos</th>
                            <th>Details</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        <?php
                        $u_email = $_SESSION["email"];

                        $sql = "SELECT * from user where email='$u_email' ";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($rowss = mysqli_fetch_assoc($result)) {
                                $owner_id = $rowss['user_id'];

                                $sql1 = "SELECT * from add_property where owner_id= '$owner_id' ";
                                $result1 = mysqli_query($db, $sql1);

                                if (mysqli_num_rows($result1) > 0) {
                                    while ($rows = mysqli_fetch_assoc($result1)) {

                        ?>
                                        <tr>

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

                                                    <i class="bi bi-check-circle-fill" style="color:green"></i><span class="ms-1">
                                                        <?php echo " ", $rows['booked'] ?>
                                                    </span>
                                                <?php
                                                } else { ?>
                                                    <i class="bi bi-check-circle-fill" style="color:red"></i><span class="ms-1">
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
                                                    <a href='<?php echo 'view-property.php?property_id=', $rows["property_id"] ?>' class=" btn-secondary ">View</a>
                                                </form>
                                            </td>
                                            <td>
                                                <!--   Button trigger modal-->
                                                <a style=" cursor: pointer;" id='<?php echo $rows["property_id"] ?>' class=" btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                            </td>

                                            <td>
                                                <a style=" cursor: pointer;" id='<?php echo $rows["property_id"] ?>' class=" btn-danger deletebtn">Delete</a>
                                            </td>

                                        </tr>

                        <?php
                                    }
                                }
                            }
                        }
                        ?>

                    </table>
                </div>
            </div>
            <!-- EDIT Modal-->
            <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                <div class="modal-dialog" style="max-width: 60%;" role="document">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="modal-content modal-dialog-scrollable">
                            <div class="modal-header">
                                <h5 class="modal-title fs-5" id="exampleModalLongTitle">Edit Property Details</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <a class=" btn-secondary" data-bs-dismiss="modal">Close</a>

                                <button type="submit" class=" btn-primary " name="edit_property">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>




            <!-- Delete Modal -->

            <div class="modal fade" id="myModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <a class=" btn-secondary" data-bs-dismiss="modal">Close</a>

                                <button type="submit" class=" btn-danger" name="delete_property">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>


        <div class="tab-pane container fade in" id="menu5" role="tabpanel" aria-labelledby="pills-menu5-tab">
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
                            <th>Booker  main Address</th>
                            <th>Mobile Number</th>
                            <th>Property Province</th>

                            <th>Property Zone</th>

>
                        </tr>

                        <?php
                    $u_email = $_SESSION["email"];

                    $sql = "SELECT * from user where email='$u_email' ";
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($rowss = mysqli_fetch_assoc($result)) {
                            $owner_id = $rowss['user_id'];

                        }}

                        $sql2 = "SELECT * , booking.booking_id , user.full_name
                        from add_property 
                        join booking on  booking.property_id = add_property.property_id
                        join user on booking.user_id=user.user_id
                        where add_property.owner_id='$owner_id'
                        ";


                        $result2 = mysqli_query($db, $sql2);

                        if (mysqli_num_rows($result2) > 0) {
                            while ($rows = mysqli_fetch_assoc($result2)) {

                        ?>
                                <tr>
                                    <td>
                                        <?php echo $rows['booking_id'] ?>
                                    </td>

                                    <?php /*
                                    $user_id = $rows['user_id'];
                                    $property_id = $rows['property_id'];
                                    $sql1 = "SELECT * from user where user_id='$user_id'";
                                    $result1 = mysqli_query($db, $sql1);

                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row = mysqli_fetch_assoc($result1)) {
*/
                                    ?>


                                            <td>
                                                <?php echo $rows['full_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $rows['address']; ?>
                                            </td>
                                            <td>
                                                <?php echo $rows['phone_no']; ?>
                                            </td>
                                      <?php
                                     /*  
                                            $sql2 = "SELECT * from add_property where property_id='$property_id'";
                                            $result2 = mysqli_query($db, $sql2);

                                            if (mysqli_num_rows($result2) > 0) {
                                                while ($ro = mysqli_fetch_assoc($result2)) {

                                          */  ?>


                                                    <td>
                                                        <?php echo $rows['province']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $rows['zone']; ?>
                                                    </td>

                                                    <?php
                                                     /*   $owner_id = $ro['owner_id'];
                                                    $sql3 = "SELECT * from user where user_id='$owner_id'";
                                                    $result3 = mysqli_query($db, $sql3);

                                                    if (mysqli_num_rows($result3) > 0) {
                                                        while ($rowss = mysqli_fetch_assoc($result3)) {

                                                    ?>
                                                            <td>
                                                                <?php echo $rowss['full_name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $rowss['address']; ?>
                                                            </td>
                                </tr>
<?php }
                                                    }*/
                                                }
                                            }
                                    /*    }
                                    }
                                }}}


                            } */?>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>







    <script>
        function viewProperty() {
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
        $(document).ready(function() {
            $('.editbtn').click(function() {
                id_property = $(this).attr('id')

                $.ajax({
                    url: "owner/itemEdit.php",
                    method: 'post',
                    data: {
                        p_id: id_property
                    },
                    success: function(result) {
                        $(".modal-body").html(result);
                    }
                });


                $('#editModal').modal("show");
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('.deletebtn').click(function() {
                id_property = $(this).attr('id')

                $.ajax({
                    url: "owner/delete.php",
                    method: 'POST',
                    data: {
                        p_id: id_property
                    },
                    success: function(result) {
                        $(".modal-body").html(result);
                    }
                });


                $('#myModal2').modal("show");
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '"><td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list" required accept="image/*" /></td></td> <td><button id="' +
                    i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

        });
    </script>

</body>