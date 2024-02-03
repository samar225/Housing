<?php 


include("config/config.php");

if(isset($_POST['book_property'])){
	

if(isset($_SESSION["email"])){
	global $db,$property_id;
  $u_email=$_SESSION["email"];

$property_id=$_GET['property_id'];
  
$sql="SELECT * FROM user where email='$u_email' and role ='student'";
    $query=mysqli_query($db,$sql);

    if(mysqli_num_rows($query)>0)
    {
      while ($rows=mysqli_fetch_assoc($query)) {
      	$user_id=$rows['user_id'];


      	$sql1="UPDATE add_property SET booked='Yes' WHERE property_id='$property_id'";
      	$query1=mysqli_query($db,$sql1);

      	$sql2="INSERT INTO booking(property_id,user_id) VALUES ('$property_id','$user_id')";
      	$query2=mysqli_query($db,$sql2);

      	if($query2)
		{


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
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>
<div class="container">
<div class="alert" role='alert'>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <center><strong>Thankyou for booking this property.</strong></center>
</div></div>



		<?php





		}

      }

  


} }}

?>