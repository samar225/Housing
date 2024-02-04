<?php
                     
                     if (isset($_POST['p_id'])) {
                       $output = '';
                       $db = mysqli_connect("localhost", "root", "", "uni");  
      
                       $property_id = $_POST['p_id'];

                       $output .= '
                        
                       <div class="form-group">
                       <p >  Approving this property? Are you sure?</p>
                           <input type="hidden" name="property_id" value="'.$property_id .'">
                         </div>  ';
                           
                     
                           
                         }
                     echo $output;
                     ?>