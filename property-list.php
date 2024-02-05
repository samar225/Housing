<?php
include("config/config.php");
?>
<link href="assets/css/main.css" rel="stylesheet">

<div class=" container">

    <div class="isotope-layout row " style="margin-top:1rem" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <aside class="col-lg-2 col-md-3 ">
            <div class="button-group" data-filter-group="type">
                <h3> PROPERTY TYPE:</h3>
                <button data-filter="" class="filter-active button ">All</button>
                <button class="button " data-filter=".filter-bed">Bed</button>
                <button class="button " data-filter=".filter-room">Room</button>
                <button class="button " data-filter=".filter-apartment">Apartment</button>
            </div>
            <div class="button-group" data-filter-group="gender">
                <h3> GENDER:</h3>
                <button data-filter="" class=" button filter-active">All genders</button>
                <button data-filter=".men" class=" button ">Men</button>
                <button data-filter=".women" class=" button">Women</button>
            </div>

           <!-- <div class="button-group sort-by-button-group">
                <button class="button filter-active" data-sort-value="high,low" />High, Low</button>
                <button class="button" data-sort-value="low,high" />Low, High</button>
            </div>-->

            <br />
        </aside>
        <section class="   col-lg-10 col-md-9">
            <div class="grid">

                <div class="row gy-4 posts-list  filter-bed men">
                    <?php

                    $sql = "SELECT * FROM `add_property` WHERE `property_type`= 'Bed' AND `approved`='Yes' AND whose='men'";
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

                                    include("property-card.php"); ?>
                                </div>
                            </div>
                        <?php

                        }

                        ?>

                    <?php
                    }

                    ?>

                </div>

                <div class=" row gy-4 posts-list  filter-room men">
                    <?php

                    $sql = "SELECT * FROM `add_property` where `property_type`= 'Room' AND `approved`='Yes' AND whose='men'";
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


                                    include("property-card.php"); ?>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    <?php
                    }

                    ?>

                </div>

                <div class=" row gy-4 posts-list  filter-apartment men">
                    <?php

                    $sql = "SELECT * FROM `add_property` where `property_type`= 'Apartment' AND `approved`='Yes' AND `whose`='men'";
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


                                    include("property-card.php"); ?>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    <?php
                    }

                    ?>

                </div>

                <div class="row gy-4 posts-list   filter-bed women">
                    <?php

                    $sql = "SELECT * FROM `add_property` WHERE `property_type`= 'Bed' AND `approved`='Yes' AND `whose`='women'";
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

                                    include("property-card.php"); ?>
                                </div>
                            </div>
                        <?php

                        }

                        ?>

                    <?php
                    }

                    ?>

                </div>

                <div class=" row gy-4 posts-list  filter-room women">
                    <?php

                    $sql = "SELECT * FROM `add_property` where `property_type`= 'Room' AND `approved`='Yes' AND `whose` ='women'";
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


                                    include("property-card.php"); ?>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    <?php
                    }

                    ?>

                </div>

                <div class=" row gy-4 posts-list filter-apartment women">
                    <?php

                    $sql = "SELECT * FROM `add_property` where `property_type`= 'Apartment' AND `approved`='Yes' AND `whose`='women'";
                    $query = mysqli_query($db, $sql);

                    if (mysqli_num_rows($query) > 0) {
                    ?>

                        <?php
                        while ($rows = mysqli_fetch_assoc($query)) {
                            $property_id = $rows['property_id'];

                        ?>

                            <div class=" col-xl-4 col-sm-6 justify-content-around">
                                <div class="card">
                                    <?php


                                    include("property-card.php"); ?>
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
        </section>

    </div>
</div>