
                  <?php
                     
                  if (isset($_POST['p_id'])) {
                    $output = '';
                    $db = mysqli_connect("localhost", "root", "", "uni");  
   
                    $property_id = $_POST['p_id'];

                    $output .= '
                     
                        <table>';

                    $sql = "SELECT * from add_property where property_id=$property_id";
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      while ($rows = mysqli_fetch_assoc($result)) {

                        $output .= '
                        
                       
                        
                        <tr>

                          <div class="row">
                            <div class="col-sm-3">
                              <div class="form-group">
                                <input type="hidden" name="property_id" value="'.$rows['property_id'].'">
                                

                                <label for="country">Country: *</label>
                                <select class="form-control" name="country" required="required">
                                  <option>
                                    ' .$rows['country'].'
                                  </option>
                                  <option value="Syria">Syria</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="province">Province/State: *</label>
                                <select class="form-control" name="province" required="required">
                                  <option>
                                   ' .$rows['province'].'
                                  </option>
                                  <option value="Damascus">Damascus</option>
                                  <option value="Aleppo">Aleppo</option>
                                  <option value="Latakia">Latakia</option>
                                  <option value="Tartus">Tartus</option>
                                  <option value="Homs">Homs</option>
                                  <option value="Hama">Hama</option>
                                  <option value="Daraa">Daraa</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="Zone">Zone:</label>
                                <input type="text" class="form-control" id="zone"
                                  value="'.$rows['province'].'" name="zone">
                              </div>
                              <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city"
                                  value="'.$rows['city'].'" name="city">
                              </div>


                              <div class="form-group">
                                <label for="contact_no">Phone Number: *</label>
                                <input type="text"  class="form-control" id="contact_no"
                                  value="'. $rows['contact_no'].'" name="contact_no">
                              </div>
                              <div class="form-group">
                                <label for="property_type">Property Type:</label>
                                <select class="form-control" name="property_type">
                                  <option value="'. $rows['property_type'].'">
                                    '. $rows['property_type'].'
                                  </option>
                                  <option value="Full House Rent">Full House Rent</option>
                                  <option value="Flat Rent">Flat Rent</option>
                                  <option value="Room Rent">Room Rent</option>
                                </select>
                              </div>

                            </div>

                            <div class="col-sm-6">


                              <div class="form-group">
                                <label for="total_rooms">Total No. of Rooms:</label>
                                <input type="number"  class="form-control" id="total_rooms"
                                  value="'. $rows['total_rooms'].'" name="total_rooms">
                              </div>
                              <div class="form-group">
                                <label for="bedroom">No. of Bedroom:</label>
                                <input type="number"  class="form-control" id="bedroom"
                                  value="'. $rows['bedroom'].'" name="bedroom">
                              </div>
                              <div class="form-group">
                                <label for="living_room">No. of Living Room:</label>
                                <input type="number"  class="form-control" id="living_room"
                                  value="'. $rows['living_room'].'" name="living_room">
                              </div>

                              <div class="form-group">
                                <label for="bathroom">No. of Bathroom/Washroom:</label>
                                <input type="number"  class="form-control" id="bathroom"
                                  value="'. $rows['bathroom'].'" name="bathroom">
                              </div>
                              <div class="form-group">
                                <label for="description">Full Description:</label>
                                <input type="comment" class="form-control" id="description"
                                  value="'. $rows['description'].'" name="description"> 
                              </div>
 
                              <div class="form-group">
                                <label for="estimated_price">Estimated Price:</label>
                                <input type="estimated_price"  class="form-control" id="estimated_price"
                                  value="'.$rows['estimated_price'].'" name="estimated_price">
                              </div>';
                              $sql2 = "SELECT * from property_photo where property_id='$property_id'";
                              $result2 = mysqli_query($db, $sql2);
                            
                              if (!empty(mysqli_num_rows($result2)) ) {
                                
                                while ($rowss = mysqli_fetch_assoc($result2)) {
                               
                                  $output.='                   <input type ="hidden" name ="property_id" value="' . $rowss['property_id'] . '">
                                                       
                                                        <input type ="hidden" name ="property_photo_id" value="' . $rowss['property_photo_id'] . '">
                                            <input type ="hidden" name ="p_photo" value="' . $rowss['p_photo'] . '">
                                                   
                       
                                                      
                                                     
                                            <td> <img  src="' . $rowss['p_photo'] . '" width="50px"></td>
                                            <td>  <input type="file" name="p_photo[]" value="' . $rowss['p_photo'] . '" placeholder="Photos"
                                              class="form-control name_list"  accept="*" /></td>';
                         }
                        }
                      }
                    }
                  }
                  $output.='</table> ';
                  echo $output;
                  ?>

<script>  
$(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list" required accept="image/*" /></td></td> <td><button id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
      });  

                 



      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  


 </script>