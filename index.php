<?php
session_start();

include("navbar.php");

?>
<!DOCTYPE html>
<html lang="en">


<!-- Hero Section - Home Page -->
<section id="hero" class="hero">

  <img src="images/homerent.jpg" alt="">

  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <h2 data-aos="fade-up" data-aos-delay="100">Welcome to Our Website</h2>
        <p data-aos="fade-up" data-aos-delay="200">Here you can find a home </p>
      </div>
      <div class="col-lg-5">
        <form method="POST" action="search-property.php" class="search-form d-flex" data-aos="fade-up" data-aos-delay="300">
          <input class="form-control" id="myInput" onkeyup="viewProperty()" type="text" placeholder="Enter location to search house." name="search_property" aria-label="Search">
          <input type="submit" class="btn btn-primary" value="Search">
        </form>
      </div>
    </div>
  </div>

</section>


<div class="content">
  <div class="row">

    <?php

    include("property-list.php");
    ?>
  


</div>
<?php

include("footer.php");
?>
<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File 
<script src="assets/js/script.js"></script>-->
<script src="assets/js/main.js"></script>
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


</script>
<script>
  // init Isotope
  var $grid = $('.grid').isotope({
    itemSelector: '.posts-list',

    getSortData: {
    color: '[data-color]',
    number: '.number parseInt'
  },
  // sort by color then number
  sortBy: [ 'color', 'number' ]
  });

  // store filter for each group
  var filters = {};

  $('.isotope-layout').on('click', '.button', function(event) {
    var $button = $(event.currentTarget);
    // get group key
    var $buttonGroup = $button.parents('.button-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // set filter for group
    filters[filterGroup] = $button.attr('data-filter');
    // combine filters
    var filterValue = concatValues(filters);
    // set filter for Isotope
    $grid.isotope({
      filter: filterValue
    });
  });

  // change is-checked class on buttons
  $('.button-group').each(function(i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function(event) {
      $buttonGroup.find('.filter-active').removeClass('filter-active');
      var $button = $(event.currentTarget);
      $button.addClass('filter-active');
    });
  });

  // flatten object by concatting values
  function concatValues(obj) {
    var value = '';
    for (var prop in obj) {
      value += obj[prop];
    }
    return value;
  }
</script>

</html>