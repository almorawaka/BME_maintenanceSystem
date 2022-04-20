<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
   
        <?php
  
        // servername => localhost
        // username => root
        // password => 123
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "123", "eldb");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $emp1 = $_REQUEST['emp1'];
        $emp2 = $_REQUEST['emp2'];
        $emp3 = $_REQUEST['emp3'];
        $emp4 = $_REQUEST['emp4'];
        $emp5 = $_REQUEST['emp5'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO job_attendee  VALUES ('$emp1', 
            '$emp2','$emp3','$emp4','$emp5')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h5>Following employee data stored in a database successfully." 
                . " to view the updated data</h5>"; 
  
            echo nl2br("\n$emp1\n $emp2\n "
                . "$emp3\n $emp4\n $emp5");
			
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
  
</body>
  
</html>