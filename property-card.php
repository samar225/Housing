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
                                      
                                        <?php   $price=$rows['estimated_price'];
                                        echo "price: $price";?>
                                    </p>
                                    <p>
                                        <?php echo $rows['description'] ?>
                                    </p>
                                    <p>
                                        <?php echo '<a class="btn btn-primary" href="view-property.php?property_id=' . $rows['property_id'] . '"  class="btn btn-lg btn-primary btn-block" >View Property </a><br>'; ?>
                                    </p>
                                    <?php ?>