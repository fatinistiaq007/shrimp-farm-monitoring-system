<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "db");  
      $output = '';  
      $query = "  
           SELECT * FROM users  
           WHERE Date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
							   <th width="5%">ID</th>  
                               <th width="10%">Temperature</th>  
                               <th width="10%">Ph</th>  
                               <th width="10%">Turbidity</th> 
							   <th width="10%">Uv</th>  
                               <th width="10%">Date</th>  
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
					 
							   <td>'. $row["Id"] .'</td>  
                               <td>'. $row["Temperature"] .'</td>  
                               <td>'. $row["PH"] .'</td>  
                               <td>'. $row["Turbidity"] .'</td>
							   <td>'. $row["UV"] .'</td>  							   
                               <td>'. $row["Date"] .'</td>  
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="6">No Data Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
