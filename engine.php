<?php
$property_id = '';
$country = '';
$province = '';
$zone = '';

$city = '';
$contact_no = '';
$property_type = '';
$estimated_price = '';
$total_rooms = '';
$bedroom = '';
$living_room = '';

$bathroom = '';
$description = '';
$booked = '';
$user_id = '';



$db = new mysqli('localhost', 'root', '', 'uni');

if ($db->connect_error) {
  echo "Error connecting database";
}

if (isset($_POST['add_property'])) {
  add_property();
}

if (isset($_POST['owner_update'])) {
  owner_update();
}
if (isset($_POST['delete_property'])) {
  delete_property();
}
if (isset($_POST['edit_property'])) {
  edit_property();
}



if (isset($_POST['delete_student'])) {
  admin_delete_student();
}
if (isset($_POST['delete_owner'])) {
  admin_delete_owner();
}

if (isset($_POST['approve_property'])) {
  approve_property();
}

function add_property()
{


  global $db;




  $country = validate($_POST['country']);
  $province = validate($_POST['province']);
  $zone = validate($_POST['zone']);
  $city = validate($_POST['city']);
  $contact_no = validate($_POST['contact_no']);
  $property_type = validate($_POST['property_type']);
  $estimated_price = validate($_POST['estimated_price']);
  $total_rooms = validate($_POST['total_rooms']);
  $bedroom = validate($_POST['bedroom']);
  $living_room = validate($_POST['living_room']);
  $bathroom = validate($_POST['bathroom']);
  $description = validate($_POST['description']);
  $booked = 'No';
  $u_email = $_SESSION['email'];
  $sql1 = "SELECT * from `user` where email='$u_email' and role ='owner'";
  $result1 = mysqli_query($db, $sql1);

  if (mysqli_num_rows($result1) > 0) {
    while ($rowss = mysqli_fetch_assoc($result1)) {
      $user_id = $rowss['user_id'];

      $sql = "INSERT INTO add_property(country,province,zone,city,contact_no,property_type,estimated_price,total_rooms,bedroom,living_room,bathroom,description,owner_id,booked) VALUES('$country','$province','$zone','$city','$contact_no','$property_type','$estimated_price','$total_rooms','$bedroom','$living_room','$bathroom','$description','$user_id','$booked')";
      $query = mysqli_query($db, $sql);
    
      $property_id = mysqli_insert_id($db);

      $countfiles = count($_FILES['p_photo']['name']);

      for ($i = 0; $i < $countfiles; $i++) {
        $paths = $_FILES['p_photo']['tmp_name'][$i];
        if ($paths != "") {
          $path = "owner/product-photo/" . $_FILES['p_photo']['name'][$i];
          if (move_uploaded_file($paths, $path)) {
            $sql2 = "INSERT INTO property_photo(p_photo,property_id) VALUES('$path','$property_id')";
            $query = mysqli_query($db, $sql2);

          }
        }

      }
      if (!empty($query)) {

        ?>

        <style>
          .alert1 {
            padding: 20px;
            background-color: green;
            color: white;
          }

          .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
          }

          .closebtn:hover {
            color: black;
          }
        </style>
        <script>
          window.setTimeout(function () {
            $(".alert1").fadeTo(1000, 0).slideUp(500, function () {
              $(this).remove();
            });
          }, 2000);
        </script>
        <div class="container">
          <div class="alert1" role='alert1'>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <center><strong>Your Product has been uploaded.</strong></center>
          </div>
        </div>


        <?php
      } else {
        echo "error";
      }

    }
  }
}


function owner_update()
{
  global $user_id, $full_name, $email, $password, $phone_no, $address, $id_type, $id_photo, $errors, $db;
  $user_id = validate($_POST['user_id']);
  $full_name = validate($_POST['full_name']);
  $email = validate($_POST['email']);
  $phone_no = validate($_POST['phone_no']);
  $address = validate($_POST['address']);
  $id_type = validate($_POST['id_type']);
  $password = md5($password); // Encrypt password
  $sql = "UPDATE user SET full_name='$full_name',email='$email',phone_no='$phone_no',address='$address',id_type='$id_type' WHERE user_id='$user_id'";
  $query = mysqli_query($db, $sql);
  if (!empty($query)) {
    ?>

    <style>
      .alert1 {
        padding: 20px;
        background-color: #7cfc00;
        color: white;
      }

      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
      }

      .closebtn:hover {
        color: black;
      }
    </style>
    <script>
      window.setTimeout(function () {
        $(".alert1").fadeTo(1000, 0).slideUp(500, function () {
          $(this).remove();
        });
      }, 2000);
    </script>
    <div class="container">
      <div class="alert1" role='alert1'>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <center><strong>Your Information has been updated.</strong></center>
      </div>
    </div>


    <?php
  }
}






function delete_property()
{

  global $property_id, $db;

  $property_id = validate($_POST['property_id']);


  $query = mysqli_query($db, "SELECT * from booking where property_id = '$property_id'");

  if (mysqli_num_rows($query) > 0) {
    ?>
    <style>
      .alert1 {
        padding: 20px;
        background-color: green;
        color: white;
      }
      .alert2 {
        padding: 20px;
        background-color: red;
        color: white;
      }
      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
      }
  
      .closebtn:hover {
        color: black;
      }
    </style>
    <script>
      window.setTimeout(function () {
        $(".alert2").fadeTo(1000, 0).slideUp(500, function () {
          $(this).remove();
        });
      }, 2000);
    </script>
    <div class="container">
      <div class="alert2" role='alert2'>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <center><strong>Can't delete property because it's BOOKED!.</strong></center>
      </div>
    </div>
    <?php
    }else{



    $del = mysqli_query($db, "DELETE from add_property where property_id = '$property_id'"); // delete query

    if ($del) {

      $sql2 = "DELETE from review where property_id='$property_id'";
      $query2 = mysqli_query($db, $sql2);


      $sql3 = "DELETE from property_photo where property_id='$property_id'";
      $query3 = mysqli_query($db, $sql3);
      if ($query3 && $query2) {
        ?>

        <style>
          .alert1 {
            padding: 20px;
            background-color: green;
            color: white;
          }

          .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
          }

          .closebtn:hover {
            color: black;
          }
        </style>
        <script>
          window.setTimeout(function () {
            $(".alert1").fadeTo(1000, 0).slideUp(500, function () {
              $(this).remove();
            });
          }, 2000);
        </script>
        <div class="container">
          <div class="alert1" role='alert1'>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <center><strong>Your property has been deleted.</strong></center>
          </div>
        </div>
     

        <?php
      } else {
        echo "error";
      }

    }
  } 


}

function validate($data)
{
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<?php

function edit_property()
{



  global $property_id, $country, $province, $zone, $city, $contact_no, $property_type, $estimated_price, $total_rooms, $bedroom, $living_room, $bathroom, $description, $p_photo, $property_photo_id, $user_id, $booked, $property_photo_id, $db;


  $property_id = validate($_POST['property_id']);
  $country = validate($_POST['country']);
  $province = validate($_POST['province']);
  $zone = validate($_POST['zone']);
  $city = validate($_POST['city']);
  $contact_no = validate($_POST['contact_no']);
  $property_type = validate($_POST['property_type']);
  $estimated_price = validate($_POST['estimated_price']);
  $total_rooms = validate($_POST['total_rooms']);
  $bedroom = validate($_POST['bedroom']);
  $living_room = validate($_POST['living_room']);
  $bathroom = validate($_POST['bathroom']);
  $description = validate($_POST['description']);
  $property_photo_id = validate($_POST['property_photo_id']);
  $booked = 'No';

  $u_email = $_SESSION['email'];
  $sql1 = "SELECT * from user where email='$u_email'";
  $result1 = mysqli_query($db, $sql1);

  if (mysqli_num_rows($result1) > 0) {
    while ($rowss = mysqli_fetch_assoc($result1)) {
      $user_id = $rowss['user_id'];

      try {
        $sql4 = "UPDATE  add_property 
         SET country='$country',
         province='$province',
         zone='$zone',
         city='$city',
         contact_no='$contact_no',
         property_type='$property_type',
         estimated_price='$estimated_price',
         total_rooms='$total_rooms',
         bedroom='$bedroom',
         living_room='$living_room',
         bathroom='$bathroom',
         description='$description'
       WHERE property_id='$property_id' ";


        $query = mysqli_query($db, $sql4);
      } catch (mysqli_sql_exception $e) {
        var_dump($e);
        exit;
      }

      $countfiles = count($_FILES['p_photo']['name']);

      for ($i = 0; $i < $countfiles; $i++) {
        $paths = $_FILES['p_photo']['tmp_name'][$i];
        if ($paths != "") {
          $path = "owner/product-photo/" . $_FILES['p_photo']['name'][$i];
          if (move_uploaded_file($paths, $path)) {
            $sql2 = "UPDATE  property_photo SET 
            p_photo='$path'
            WHERE property_id='$property_id'
            AND property_photo_id='$property_photo_id' ";

            $query = mysqli_query($db, $sql2);

          }
        }

      }
      if (!empty($query)) {

        ?>

        <style>
          .alert1 {
            padding: 20px;
            background-color: green;
            color: white;
          }

          .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
          }

          .closebtn:hover {
            color: black;
          }
        </style>
        <script>
          window.setTimeout(function () {
            $(".alert1").fadeTo(1000, 0).slideUp(500, function () {
              $(this).remove();
            });
          }, 2000);
        </script>
        <div class="container">
          <div class="alert1" role='alert1'>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <center><strong>Your Product has been updated.</strong></center>
          </div>
        </div>


        <?php
      } else {
        echo "error";
      }

    }

  }
}






function approve_property()
{



  global $property_id, $db, $approve;


  $property_id = validate($_POST['property_id']);
 // $approve = validate($_POST['approved']);



  try {
    $sql5 = "UPDATE  add_property SET approved= 'Yes'
       WHERE property_id='$property_id' ";


    $query = mysqli_query($db, $sql5);
  } catch (mysqli_sql_exception $e) {
    var_dump($e);
    exit;
  }

  if (!empty($query)) {

    ?>

    <style>
      .alert1 {
        padding: 20px;
        background-color: green;
        color: white;
      }

      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
      }

      .closebtn:hover {
        color: black;
      }
    </style>
    <script>
      window.setTimeout(function () {
        $(".alert1").fadeTo(1000, 0).slideUp(500, function () {
          $(this).remove();
        });
      }, 2000);
    </script>
    <div class="container">
      <div class="alert1" role='alert1'>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <center><strong> Property has been Approved.</strong></center>
      </div>
    </div>


    <?php
  } else {
    echo "error";
  }


}

function admin_delete_student()
{


  global $s_id, $db;

  $s_id = validate($_POST['user_id']);

  if (!empty($s_id)) {

    $del = mysqli_query($db, "delete from user where user_id = '$s_id'"); // delete query

    if ($del) {

      ?>

      <style>
        .alert1 {
          padding: 20px;
          background-color: green;
          color: white;
        }

        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }

        .closebtn:hover {
          color: black;
        }
      </style>
      <script>
        window.setTimeout(function () {
          $(".alert1").fadeTo(1000, 0).slideUp(500, function () {
            $(this).remove();
          });
        }, 2000);
      </script>
      <div class="container">
        <div class="alert1" role='alert1'>
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <center><strong> student has been deleted.</strong></center>
        </div>
      </div>


      <?php
    } else {
      echo "error";
    }

  }


}


function admin_delete_owner()
{



  global $owner_id, $db;

  $user_id = validate($_POST['user_id']);

  if (!empty($user_id)) {
    $sql = "DELETE  from `user` where user_id = '$user_id'";
    $del = mysqli_query($db, $sql); // delete query

    if ($del) {

      ?>

      <style>
        .alert1 {
          padding: 20px;
          background-color: green;
          color: white;
        }

        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }

        .closebtn:hover {
          color: black;
        }
      </style>
      <script>
        window.setTimeout(function () {
          $(".alert1").fadeTo(1000, 0).slideUp(500, function () {
            $(this).remove();
          });
        }, 2000);
      </script>
      <div class="container">
        <div class="alert1" role='alert1'>
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <center><strong>owner has been deleted.</strong></center>
        </div>
      </div>


      <?php
    } else { ?>
      <style>
        .alert1 {
          padding: 20px;
          background-color: green;
          color: white;
        }

        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }

        .closebtn:hover {
          color: black;
        }
      </style>
      <script>
        window.setTimeout(function () {
          $(".alert1").fadeTo(1000, 0).slideUp(500, function () {
            $(this).remove();
          });
        }, 2000);
      </script>
      <div class="container">
        <div class="alert1" role='alert1'>
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <center><strong>Cannt delete.</strong></center>
        </div>
      </div>


      <?php
    }

  }
}
?>