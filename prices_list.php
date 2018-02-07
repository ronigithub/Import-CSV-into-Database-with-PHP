<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = 'test';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  $Sql = "SELECT * FROM price_list ORDER BY country ASC";
  $result = $conn->query($Sql);  

    if ($result->num_rows > 0) {  
        
        $data_arr = array();
        $data_item = array();
        $data_arr['price']=array(); 

        while($row = $result->fetch_assoc()) {          
            $data_item['prefix'] = $row['prefix'];
            $data_item['country'] = $row['country'];
            $data_item['rate'] = $row['rate'];

            // array_push($data_arr, $data_item);        
            array_push($data_arr['price'], $data_item);        
        }
    
      echo json_encode($data_arr);
     
    } else {
      echo json_encode(
        array("message" => "No data found.")
      );
    }


 ?>