<?php

$user_id = '';
$full_name = '';
$gender='';
$email = '';
$role = '';
$password = '';
$phone_no = '';
$address = '';
$id_type = '';
$id_photo = '';
$profile_photo = '';

$errors = array();

$db = new mysqli('localhost', 'root', '', 'uni');

if ($db->connect_error) {
	echo "Error connecting database";
}
if (isset($_POST['login'])) {
	login();
}
if(isset($_POST['register'])){
	register();
}


function login()
{
	global $email, $db;
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	$password = md5($password);
	$sql = "SELECT * FROM user where email='$email' AND password='$password' LIMIT 1";
	$result = $db->query($sql);
	if ($result->num_rows == 1) {
		$data = $result->fetch_assoc();
		$logged_user = $data['email'];
		session_start();
		$_SESSION['email'] = $email;
		header('location:index.php');


	} else {

		?>

		<style>
			.alert {
				padding: 20px;
				background-color: #DC143C;
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
		<div class="container">
			<div class="alert">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				<strong>Incorrect Email/Password or not registered.</strong> Click here to <a href="register.php"
					style="color: lightblue;"><b>Register</b></a>.
			</div>
		</div>


		<?php
	}
}


function register(){
	global $full_name,$gender,$email,$password,$phone_no,$address,$id_type,$id_photo,$errors,$profile_photo,$db;
	//$user_id=validate($_POST['user_id']);
	$full_name=validate($_POST['full_name']);
	$gender=validate($_POST['gender']);
	$role=validate($_POST['role']);
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);
	$phone_no=validate($_POST['phone_no']);
	$address=validate($_POST['address']);
	$id_type=validate($_POST['id_type']);
	
	$password = md5($password); // Encrypt password
				$user_id = mysqli_insert_id($db);
		


	if(isset($_FILES['id_photo']))
	{
$id_photo='images/id_photo'.$_FILES['id_photo']['name'];

// echo $_FILES['image']['name'].'<br>';

/*if(!empty($_FILES['id_photo'])){
    $path = "images/id_photo";
    $path=$path. basename($_FILES['id_photo']['name']);
        if(move_uploaded_file($_FILES['id_photo']['tmp_name'], $path))
        {
            echo"The file ". basename($_FILES['id_photo']['name']). " has been uploaded";
        }

        else{
            echo "There was an error uploading the file, please try again!";
        }
}*/

	}

	if(isset($_FILES['profile_photo']))
	{
$profile_photo='images/profile_photo'.$_FILES['profile_photo']['name'];

// echo $_FILES['image']['name'].'<br>';

/*if(!empty($_FILES['profile_photo'])){
    $path = "images/profile_photo";
    $path=$path. basename($_FILES['id_photo']['name']);
        if(move_uploaded_file($_FILES['id_photo']['tmp_name'], $path))
        {
            echo"The file ". basename($_FILES['id_photo']['name']). " has been uploaded";
        }

        else{
            echo "There was an error uploading the file, please try again!";
        }
}*/

	}


	$sql = "INSERT INTO user(full_name,gender,role,email,password,phone_no,address,id_type,id_photo,profile_photo) VALUES('$full_name','$gender','$role','$email','$password','$phone_no','$address','$id_type','$id_photo','$profile_photo')";

		
		if($db->query($sql)===TRUE){
			header("location:login.php");
	}
}


function validate($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function admin_delete_student()
{


	global $t_id, $db;

	$s_id = validate($_POST['user_id']);

	if (!empty($t_id)) {

		$del = mysqli_query($db, "delete from student where student_id = '$s_id'"); // delete query

		if ($del) {

			?>

			<style>
				.alert {
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
					$(".alert").fadeTo(1000, 0).slideUp(500, function () {
						$(this).remove();
					});
				}, 2000);
			</script>
			<div class="container">
				<div class="alert" role='alert'>
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

	if (!empty($owner_id)) {
		$sql = "DELETE  from `user` where user_id = '$user_id'";
		$del = mysqli_query($db, $sql); // delete query

		if ($del) {

			?>

			<style>
				.alert {
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
					$(".alert").fadeTo(1000, 0).slideUp(500, function () {
						$(this).remove();
					});
				}, 2000);
			</script>
			<div class="container">
				<div class="alert" role='alert'>
					<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
					<center><strong>owner has been deleted.</strong></center>
				</div>
			</div>


			<?php
		} else {?>
			<style>
				.alert {
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
					$(".alert").fadeTo(1000, 0).slideUp(500, function () {
						$(this).remove();
					});
				}, 2000);
			</script>
			<div class="container">
				<div class="alert" role='alert'>
					<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
					<center><strong>Cannt delete.</strong></center>
				</div>
			</div>


			<?php
		}

	}
}
