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
    // echo "Connected successfully";

    if(isset($_POST["Import"])){
        
         $sql = "TRUNCATE TABLE price_list";
         $conn->query($sql);

        $filename=$_FILES["file"]["tmp_name"];      

        if($_FILES["file"]["size"] > 0)
        {
            $file = fopen($filename, "r");

            $firstrow = true;            

            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
             {

                if($firstrow) { 
                    $firstrow = false; continue; 
                }

                $sql = "INSERT into price_list (prefix, country, rate) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."')";
                   $result = $conn->query($sql);
                if(!isset($result))
                {
                    echo "<script type=\"text/javascript\">
                            alert(\"Invalid File:Please Upload CSV File.\");
                            window.location = \"index.php\"
                          </script>";       
                }
                else {
                      echo "<script type=\"text/javascript\">
                        alert(\"CSV File has been successfully Imported.\");
                        window.location = \"index.php\"
                    </script>";
                }
             }
             
            
             fclose($file); 
         }
    }

    $conn->close();

?>