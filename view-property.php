<?php
session_start();
isset($_SESSION["email"]);

?>

<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Favicons -->
  <link href="logo/png/logo.png" rel="icon">
  <link href="logo/png/logo-no-background.png" rel="logo">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body>




  <?php
  include('config/config.php');
  include('navbar.php');
  include('review-engine.php');
  include('booking-engine.php');

  ?>



  <?php


  $property_id = $_GET['property_id'];
  $sql = "SELECT * from add_property where property_id='$property_id'";
  $query = mysqli_query($db, $sql);

  if (mysqli_num_rows($query) > 0) {
    while ($rows = mysqli_fetch_assoc($query)) {



      $sql2 = "SELECT * FROM property_photo where property_id='$property_id'";
      $query2 = mysqli_query($db, $sql2);

      $rowcount = mysqli_num_rows($query2);
      ?>

      <!-- Carousel   -->
      <div class="row justify-content-center">

        <div class="col-lg-8 ">
          <div id="property-single-carousel" class="swiper">
            <div class="swiper-wrapper">
              <?php for ($i = 1; $i <= $rowcount; $i++) {
                $row = mysqli_fetch_array($query2);
                $photo = $row['p_photo'];
                ?>



                <div class="carousel-item-b swiper-slide">
                  <img src="<?php echo $photo ?>">
                </div>
                <?php
              }
              ?>
            </div>

          </div>
          <div class="property-single-carousel-pagination carousel-pagination"></div>
        </div>
      </div>
      <!-- End Carousel   -->

      <div class="row justify-content-around " style="margin:1rem">
        <center>
          <h2>
            <?php echo $rows['property_type'] ?>
          </h2>
        </center>
        <td>


          <div class="col-sm-5">
            <table class="myTable">
              <tr>
                <td>
                  <p>Country:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['country']; ?>
                  </h6>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Province:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['province']; ?>
                  </h6>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Zone:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['zone']; ?>
                  </h6>
                </td>
              </tr>

              <tr>
                <td>
                  <p>City:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['city']; ?>
                  </h6>
                </td>
              </tr>


              <tr>
                <td>
                  <p>Contact No.:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['contact_no']; ?>
                  </h6>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Estimated Price:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['estimated_price']; ?> SYL.
                  </h6>
                </td>
              </tr>
            </table>





            <table class="myTable">
              <tr>
                <td>
                  <p>Total Rooms:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['total_rooms']; ?>
                  </h6>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Bedrooms:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['bedroom']; ?>
                  </h6>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Living Room:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['living_room']; ?>
                  </h6>
                </td>
              </tr>

              <tr>
                <td>
                  <p>Bathroom:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['bathroom']; ?>
                  </h6>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Booked:</p>
                </td>
                <td>
                  <h6>
                    <?php echo $rows['booked']; ?>
                  </h6>
                </td>
              </tr>
              <tr>

              </tr>
            </table>
          </div>

          <div class="col-sm-5">


            <h4 style="margin:1rem">Description:</h4>

            <p>
              <?php echo $rows['description']; ?>
            </p>


            <br><br><br>
            <!-- Review Property -->
            <div class="container-fluid">
              <h4>Review Property:</h4>
              <div class="well well-sm">
                <div class="text-right">
                  <?php

                  if (isset($_SESSION["email"]) && !empty($_SESSION['email'])) {
                    ?>
                    <a class="btn btn-success " href="#reviews-anchor" style="width: 100%" id="open-review-box">Leave a
                      Review</a>
                  </div>
                  <br>
                  <div class="row" id="post-review-box" style="display:none;">
                    <div class="col-md-12">
                      <form accept-charset="UTF-8" method="POST">
                        <input name="property_id" type="hidden" value="<?php echo $property_id; ?>">
                        <input id="ratings-hidden" name="rating" type="hidden">
                        <textarea class="form-control animated" cols="50" id="new-review" name="comment"
                          placeholder="Enter your review here..." rows="5"></textarea>

                        <div class="text-right">
                          <div class="stars starrr" data-rating="0"></div>
                          <a class="btn btn-danger btn-sm" href="#" id="close-review-box"
                            style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                          <button class="btn btn-success btn-lg" type="submit" name="review">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                <?php } else {
                    echo "<center>You should login to review property.</center>";
                  }
                  ?>


              </div>

            </div>

            <?php

            $sql1 = "SELECT * from review where property_id='$property_id'";
            $query = mysqli_query($db, $sql1);
            echo '<div class="container-fluid">';
            echo '<h4>Reviews:</h4>';
            echo '</div>';
            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <div class="container-fluid">
                  <ul>
                    <li>
                      <?php echo $row['comment']; ?> &nbsp;&nbsp;&nbsp;(<span class="glyphicon bi bi-star"
                        style="size: 50px;">
                        <?php echo $row['rating']; ?>
                      </span>)
                    </li>
                  </ul>
                </div>


                <?php
              }
            }
            ?>

          </div>

      </div>


      <?php

      if (isset($_SESSION["email"]) && !empty($_SESSION['email'])) {

        ?>
        <form method="POST">
          <div class="row d-flex justify-content-around" style="margin-top:1rem">
            <div class="col-sm-5 d-flex justify-content-around" style="margin-top:1rem">
              <?php
              $booked = $rows['booked'];

              if ($booked == 'No') { ?>
                <input type="hidden" name="property_id" value="<?php echo $rows['property_id']; ?>">
                <input type="submit" class="btn-secondary" name="book_property" value="Book Property">
              <?php } else { ?>
                <input type="submit" class=" btn-secondary" value="Property Booked" disabled>
              <?php } ?>
            </div>
        </form>
        <div class="col-sm-5 d-flex justify-content-around" style="margin-top:1rem">
    
            <?php
            $user_id = $rows['owner_id'];
           
            $sql4 = "SELECT * from `user` where  `user_id`='$user_id'";
            $query4 = mysqli_query($db, $sql4);

            if (mysqli_num_rows($query4) > 0) {

              while ($rowss = mysqli_fetch_assoc($query4)) {
       
                ?>

               <a href="https://wa.me/+<?php echo $rowss['phone_no']; ?>" class=" btn btn-success">Send Message</a>
                <?php }
            } ?>
              
            </div>


        </div>
        </div>
      <?php } else {
        echo "<center><h3>You should login to book property.</h3></center>";
      }


      ?>

      <br>

      <br>


      <?php
    }
  } ?>



<style>
   .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.stars
{
    margin: 20px 0;
    font-size: 24px;
    color: #d17581;
}
</style>

<script>
  (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .bi bi-star'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("bi bi-star").addClass("bi-star-fill")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("bi-star-fill").addClass("bi bi-star")}}if(!e){return this.$el.find("span").removeClass("bi-star-fill").addClass("bi bi-star")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var openReviewBtn = $('#open-review-box');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');

  openReviewBtn.click(function(e)
  {
    reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();
    
  });

  $('.starrr').on('starrr:change', function(e, value){
    ratingsField.val(value);
  });
});
</script>











  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main2.js"></script>
<script>
  (function (e) { var t, o = { className: "autosizejs", append: "", callback: !1, resizeDelay: 10 }, i = '<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>', n = ["fontFamily", "fontSize", "fontWeight", "fontStyle", "letterSpacing", "textTransform", "wordSpacing", "textIndent"], s = e(i).data("autosize", !0)[0]; s.style.lineHeight = "99px", "99px" === e(s).css("lineHeight") && n.push("lineHeight"), s.style.lineHeight = "", e.fn.autosize = function (i) { return this.length ? (i = e.extend({}, o, i || {}), s.parentNode !== document.body && e(document.body).append(s), this.each(function () { function o() { var t, o; "getComputedStyle" in window ? (t = window.getComputedStyle(u, null), o = u.getBoundingClientRect().width, e.each(["paddingLeft", "paddingRight", "borderLeftWidth", "borderRightWidth"], function (e, i) { o -= parseInt(t[i], 10) }), s.style.width = o + "px") : s.style.width = Math.max(p.width(), 0) + "px" } function a() { var a = {}; if (t = u, s.className = i.className, d = parseInt(p.css("maxHeight"), 10), e.each(n, function (e, t) { a[t] = p.css(t) }), e(s).css(a), o(), window.chrome) { var r = u.style.width; u.style.width = "0px", u.offsetWidth, u.style.width = r } } function r() { var e, n; t !== u ? a() : o(), s.value = u.value + i.append, s.style.overflowY = u.style.overflowY, n = parseInt(u.style.height, 10), s.scrollTop = 0, s.scrollTop = 9e4, e = s.scrollTop, d && e > d ? (u.style.overflowY = "scroll", e = d) : (u.style.overflowY = "hidden", c > e && (e = c)), e += w, n !== e && (u.style.height = e + "px", f && i.callback.call(u, u)) } function l() { clearTimeout(h), h = setTimeout(function () { var e = p.width(); e !== g && (g = e, r()) }, parseInt(i.resizeDelay, 10)) } var d, c, h, u = this, p = e(u), w = 0, f = e.isFunction(i.callback), z = { height: u.style.height, overflow: u.style.overflow, overflowY: u.style.overflowY, wordWrap: u.style.wordWrap, resize: u.style.resize }, g = p.width(); p.data("autosize") || (p.data("autosize", !0), ("border-box" === p.css("box-sizing") || "border-box" === p.css("-moz-box-sizing") || "border-box" === p.css("-webkit-box-sizing")) && (w = p.outerHeight() - p.height()), c = Math.max(parseInt(p.css("minHeight"), 10) - w || 0, p.height()), p.css({ overflow: "hidden", overflowY: "hidden", wordWrap: "break-word", resize: "none" === p.css("resize") || "vertical" === p.css("resize") ? "none" : "horizontal" }), "onpropertychange" in u ? "oninput" in u ? p.on("input.autosize keyup.autosize", r) : p.on("propertychange.autosize", function () { "value" === event.propertyName && r() }) : p.on("input.autosize", r), i.resizeDelay !== !1 && e(window).on("resize.autosize", l), p.on("autosize.resize", r), p.on("autosize.resizeIncludeStyle", function () { t = null, r() }), p.on("autosize.destroy", function () { t = null, clearTimeout(h), e(window).off("resize", l), p.off("autosize").off(".autosize").css(z).removeData("autosize") }), r()) })) : this } })(window.jQuery || window.$);

  var __slice = [].slice; (function (e, t) { var n; n = function () { function t(t, n) { var r, i, s, o = this; this.options = e.extend({}, this.defaults, n); this.$el = t; s = this.defaults; for (r in s) { i = s[r]; if (this.$el.data(r) != null) { this.options[r] = this.$el.data(r) } } this.createStars(); this.syncRating(); this.$el.on("mouseover.starrr", "span", function (e) { return o.syncRating(o.$el.find("span").index(e.currentTarget) + 1) }); this.$el.on("mouseout.starrr", function () { return o.syncRating() }); this.$el.on("click.starrr", "span", function (e) { return o.setRating(o.$el.find("span").index(e.currentTarget) + 1) }); this.$el.on("starrr:change", this.options.change) } t.prototype.defaults = { rating: void 0, numStars: 5, change: function (e, t) { } }; t.prototype.createStars = function () { var e, t, n; n = []; for (e = 1, t = this.options.numStars; 1 <= t ? e <= t : e >= t; 1 <= t ? e++ : e--) { n.push(this.$el.append("<span class='glyphicon .bi bi-star'></span>")) } return n }; t.prototype.setRating = function (e) { if (this.options.rating === e) { e = void 0 } this.options.rating = e; this.syncRating(); return this.$el.trigger("starrr:change", e) }; t.prototype.syncRating = function (e) { var t, n, r, i; e || (e = this.options.rating); if (e) { for (t = n = 0, i = e - 1; 0 <= i ? n <= i : n >= i; t = 0 <= i ? ++n : --n) { this.$el.find("span").eq(t).removeClass("bi bi-star").addClass("bi-star-fill") } } if (e && e < 5) { for (t = r = e; e <= 4 ? r <= 4 : r >= 4; t = e <= 4 ? ++r : --r) { this.$el.find("span").eq(t).removeClass("bi-star-fill").addClass("bi bi-star") } } if (!e) { return this.$el.find("span").removeClass("bi-star-fill").addClass("bi bi-star") } }; return t }(); return e.fn.extend({ starrr: function () { var t, r; r = arguments[0], t = 2 <= arguments.length ? __slice.call(arguments, 1) : []; return this.each(function () { var i; i = e(this).data("star-rating"); if (!i) { e(this).data("star-rating", i = new n(e(this), r)) } if (typeof r === "string") { return i[r].apply(i, t) } }) } }) })(window.jQuery, window); $(function () { return $(".starrr").starrr() })

  $(function () {

    $('#new-review').autosize({ append: "\n" });

    var reviewBox = $('#post-review-box');
    var newReview = $('#new-review');
    var openReviewBtn = $('#open-review-box');
    var closeReviewBtn = $('#close-review-box');
    var ratingsField = $('#ratings-hidden');

    openReviewBtn.click(function (e) {
      reviewBox.slideDown(400, function () {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
      openReviewBtn.fadeOut(100);
      closeReviewBtn.show();
    });

    closeReviewBtn.click(function (e) {
      e.preventDefault();
      reviewBox.slideUp(300, function () {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
      closeReviewBtn.hide();

    });

    $('.starrr').on('starrr:change', function (e, value) {
      ratingsField.val(value);
    });
  });
</script>
  <?php include('footer.php'); ?>
</body>

</html>