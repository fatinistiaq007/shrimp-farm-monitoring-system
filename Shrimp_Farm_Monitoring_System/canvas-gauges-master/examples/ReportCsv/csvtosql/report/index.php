<?php  
 $connect = mysqli_connect("localhost", "root", "", "db");  
 $query = "SELECT * FROM users ORDER BY id asc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Search Report by Date</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
		   <style>
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 35px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

.city {
    background-color: tomato;
    color: white;
    padding: 10px;
} 	
	</style>
      </head>  
      <body>
	 <center>  
  
           <div class="container" style="width:1000px;">  
<h3 align="center"class="city">REPORT</h3><br />  

                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="button"  name="filter" id="filter" value="Filter By Date" class="btn btn-info" />  
				 </div>  
				
				
				 
                
				<div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="10%">Temperature</th>  
                               <th width="10%">Ph</th>  
                               <th width="10%">Turbidity</th> 
							   <th width="10%">Uv</th>  
                               <th width="10%">Date</th>  
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["Id"]; ?></td>  
                               <td><?php echo $row["Temperature"]; ?></td>  
                               <td><?php echo $row["PH"]; ?></td>  
                               <td><?php echo $row["Turbidity"]; ?></td>
							   <td><?php echo $row["UV"]; ?></td>  							   
                               <td><?php echo $row["Date"]; ?></td>  
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
		    <center><pre> <a href="..\..\..\index_new.php"><button class="button">HOME</button></a>     <a href="..\printpdf\tcpdf.php"><button class="button">PRINT/PDF</button></a></pre></center>
		 </center>  
		
      </body>  
 </html>  
 <script>  

function myFunction() {
    window.print();
}

 
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
