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

<?php
include("Product.php");
$product = new Product();
$categories = $product->getCategories();
$productSizes = $product->getProductSize();

?>
<div class="content">
  


    <div class="row">
      <aside class="col-lg-2 col-md-3 sidenav">

        <div class="list-group">
          <h3>Price</h3>
          <input type="hidden" id="hidden_minimum_price" value="0" />
          <input type="hidden" id="hidden_maximum_price" value="10000000" />
          <p id="price_show">0 - 10 M</p>
          <div id="price_range"></div>
        </div>
        <div class="list-group">
          <h3>GENDER</h3>
          <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
          
              <div class="list-group-item checkbox">
                <label><input type="checkbox" class="common_selector whose" value="men"> Men</label> <br/>
                <label><input type="checkbox" class="common_selector whose" value="women"> Women</label>
              </div>
         

           
          </div>
        </div>

        <div class="list-group">

        </div>

   
        </aside>

    

      <section class="col-lg-10 col-md-9">
        <?php include("property-list.php"); ?>

      </section>
    </div>
    <input type="hidden" id="totalRecords" value="<?php echo $totalRecords; ?>">


</div>
<?php

include("footer.php");
?>
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/script.js"></script>
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
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
<script>
  // لتثبيت القائمة الجانبية
  $(document).ready(function(){
  
  // Even when the window is resized, run this code.
  $(window).resize(function(){
    
    // Variables
    var windowHeight = $(window).height();
    
    // Find the value of 90% of the viewport height
    var ninetypercent = .9 * windowHeight;
    
    // When the document is scrolled ninety percent, toggle the classes
    // Does not work in iOS 7 or below
    // Hasn't been tested in iOS 8
    $(document).scroll(function(){
      
      // Store the document scroll function in a variable
      var y = $(this).scrollTop();
      
      // If the document is scrolled 90%
      if( y > ninetypercent) {
        
        // Add the "sticky" class
        $('sidenav').addClass('sticky');
      } else {
        // Else remove it.
        $('sidenav').removeClass('sticky');
      }
    });

  // Call it on resize.
  }).resize();
  
}); // jQuery
</script>
</html>