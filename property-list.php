<?php
include("config/config.php");
?>
<link href="assets/css/main.css" rel="stylesheet">

<div class="container">

    <div class="isotope-layout" style="margin-top:1rem" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <!-- <select class="btn btn-success  dropdown-toggle  isotope-filters">
            <option value="*" selected class="filter-active">Filter</option>
            <option value="man">Male</option>
            <option value="woman">Female</option>
            <option value=" ">High Price</option>
            <option value="">Less Price</option>
        </select> -->
        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-bed">Bed</li>
            <li data-filter=".filter-room">Room</li>
            <li data-filter=".filter-apartment">Apartment</li>
        </ul><!-- End Portfolio Filters -->


        <div class="body-product">

           
            <div class=" isotope-container main-body" data-aos="fade-up" data-aos-delay="200">


                <div class="row gy-4 posts-list  isotope-item filter-bed">
                    <?php

                    $sql = "SELECT * FROM `add_property` WHERE `property_type`= 'Bed' AND `approved`='Yes'";
                    $query = mysqli_query($db, $sql);

                    if (mysqli_num_rows($query) > 0) {
                    ?>

                        <?php
                        while ($rows = mysqli_fetch_assoc($query)) {
                            $property_id = $rows['property_id'];

                        ?>
                            <div class="d-flex col-xl-4 col-sm-6 justify-content-around">

                                <div class="card">
                                    <?php


                                    $sql2 = "SELECT * FROM property_photo where property_id =' $property_id '";
                                    $query2 = mysqli_query($db, $sql2);

                                    if (mysqli_num_rows($query2) > 0) {
                                        $row = mysqli_fetch_assoc($query2);
                                        $photo = $row['p_photo'];
                                        echo '<img class="post-img" src="' . $photo . '">';
                                    } ?>

                                    <p class="post-category">
                                        <?php echo $rows['property_type'] . ' / ' . $rows['city'] . ' / ' . $rows['whose']; ?>
                                    </p>
                                    <p>
                                        <?php echo $rows['description'] ?>
                                    </p>
                                    <p>
                                        <?php echo '<a class="btn btn-primary" href="view-property.php?property_id=' . $rows['property_id'] . '"  class="btn btn-lg btn-primary btn-block" >View Property </a><br>'; ?>
                                    </p>
                                    <?php ?>
                                </div>
                            </div>
                        <?php

                        }

                        ?>

                    <?php
                    }

                    ?>

                </div>

                <div class=" row gy-4 posts-list isotope-item filter-room">
                    <?php

                    $sql = "SELECT * FROM `add_property` where `property_type`= 'Room' AND `approved`='Yes'";
                    $query = mysqli_query($db, $sql);

                    if (mysqli_num_rows($query) > 0) {
                    ?>

                        <?php

                        while ($rows = mysqli_fetch_assoc($query)) {
                            $property_id = $rows['property_id'];

                        ?>
                            <div class="d-flex col-xl-4 col-sm-6 justify-content-around">

                                <div class="card">
                                    <?php


                                    $sql2 = "SELECT * FROM property_photo where property_id =' $property_id '";
                                    $query2 = mysqli_query($db, $sql2);

                                    if (mysqli_num_rows($query2) > 0) {
                                        $row = mysqli_fetch_assoc($query2);
                                        $photo = $row['p_photo'];
                                        echo '<img class="post-img" src="' . $photo . '">';
                                    } ?>

                                    <p class="post-category">
                                        <?php echo $rows['property_type'] . ' / ' . $rows['city'] . ' / ' . $rows['whose']; ?>
                                    </p>
                                    <p>
                                        <?php echo $rows['description'] ?>
                                    </p>
                                    <p>
                                        <?php echo '<a class="btn btn-primary" href="view-property.php?property_id=' . $rows['property_id'] . '"  class="btn btn-lg btn-primary btn-block" >View Property </a><br>'; ?>
                                    </p>
                                    <?php ?>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    <?php
                    }

                    ?>

                </div>

                <div class=" row gy-4 posts-list isotope-item filter-apartment">
                    <?php

                    $sql = "SELECT * FROM `add_property` where `property_type`= 'Apartment' AND `approved`='Yes'";
                    $query = mysqli_query($db, $sql);

                    if (mysqli_num_rows($query) > 0) {
                    ?>

                        <?php
                        while ($rows = mysqli_fetch_assoc($query)) {
                            $property_id = $rows['property_id'];

                        ?>

                            <div class="d-flex col-xl-4 col-sm-6 justify-content-around">
                                <div class="card">
                                    <?php


                                    $sql2 = "SELECT * FROM property_photo where property_id =' $property_id '";
                                    $query2 = mysqli_query($db, $sql2);

                                    if (mysqli_num_rows($query2) > 0) {
                                        $row = mysqli_fetch_assoc($query2);
                                        $photo = $row['p_photo'];
                                        echo '<img class="post-img" src="' . $photo . '">';
                                    } ?>
                                    <p class="post-category">
                                        <?php echo $rows['property_type'] . ' / ' . $rows['city'] . ' / ' . $rows['whose']; ?>
                                    </p>
                                    <p>
                                        <?php echo $rows['description'] ?>
                                    </p>
                                    <p>
                                        <?php echo '<a class="btn btn-primary" href="view-property.php?property_id=' . $rows['property_id'] . '"  class="btn btn-lg btn-primary btn-block" >View Property </a><br>'; ?>
                                    </p>
                                    <?php ?>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    <?php
                    }

                    ?>

                </div>

            </div>
        </div>
    </div>
</div>