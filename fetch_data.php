<?php

//fetch_data.php

include('config.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM add_property 
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND estimated_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["all"]))
	{
		$all_filter = implode("','", $_POST["all"]);
		$query .= "
		 AND estimated_price IN('".$all_filter."')
		";
	}
	if(isset($_POST["men"]))
	{
		$men_filter = implode("','", $_POST["men"]);
		$query .= "
		 AND whose IN('".$men_filter."')
		";
	}
	if(isset($_POST["women"]))
	{
		$women_filter = implode("','", $_POST["women"]);
		$query .= "
		 AND whose IN('".$women_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	

	$output = '';
	if($total_row > 0)
	{
		foreach($result as $rows)
		{	$sql2 = "SELECT * FROM property_photo where property_id =' $property_id '";
			$query2 = mysqli_query($db, $sql2);
		
			if (mysqli_num_rows($query2) > 0) {
				$row = mysqli_fetch_assoc($query2);
				$photo = $row['p_photo'];
			$output .= '
		    


                                        <img class="post-img" src="' . $photo . '">
                                   

                                    <p class="post-category">
                                        '. $rows['property_type'] . ' / ' . $rows['city'] . ' / ' . $rows['whose'].'
                                    </p>
                                    <p>
                                      '.  $rows['description'] .'
                                    </p>
                                    <p>
                                        <a class="btn btn-primary" href="view-property.php?property_id=' . $rows['property_id'] . '"  class="btn btn-lg btn-primary btn-block" >View Property </a><br>
                                    </p>
                                    
			';
		}
	}}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>