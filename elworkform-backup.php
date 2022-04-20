<?php
 
    // Connect to database
    $con = mysqli_connect("localhost","root","123","eldb");
     
    // mysqli_connect("servername","username","password","database_name")
   
    // Get all the locations from location table
    $sql = "SELECT * FROM `locations`";
    $all_locations = mysqli_query($con,$sql);
	
	// Get all the staff from staff table
    $sql = "SELECT * FROM `staff`";
    $all_staff = mysqli_query($con,$sql);


   
    // The following code checks if the submit button is clicked
    // and inserts the data in the database accordingly
    if(isset($_POST['submit']))
    {
        // Store the Product name in a "name" variable
        $name = mysqli_real_escape_string($con,$_POST['institute_name']);


         
        // Store the location ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['locations']);
		
		// Store the location ID in a "id" variable
        $s_id = mysqli_real_escape_string($con,$_POST['staff']);


         
        // Creating an insert query using SQL syntax and
        // storing it in a variable.
        $sql_insert =
        "INSERT INTO `institutes`(`institute_name`, `location_id`,`oic_id`)
            VALUES ('$name','$id','$s_id')";
           
          // The following code attempts to execute the SQL query
          // if the query executes with no errors
          // a javascript alert message is displayed
          // which says the data is inserted successfully
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Product added successfully")</script>';
        }
    }
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">    
</head>
<body>
    <form method="POST">
        <label>Name of institute:</label>
        <input type="text" name="institute_name" required><br>
		
		
        <label>Select a Location</label>
        <select name="locations">
            <?php
                // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                while ($locations = mysqli_fetch_array(
                        $all_locations,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $locations["location_id"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $locations["location_name"];
                        // To show the location name to the user
                    ?>
                </option>
            <?php
                endwhile;
                // While loop must be terminated
            ?>
        </select>
		
		
		
		
		<label>Select staff</label>
        <select name="staff">
            <?php
                // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                while ($staff = mysqli_fetch_array(
                        $all_staff,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $staff["oic_id"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $staff["oic_name"];
                        // To show the location name to the user
                    ?>
                </option>
            <?php
                endwhile;
                // While loop must be terminated
            ?>
        </select>
        <br>

        <input type="submit" value="submit" name="submit">
    </form>
    <br>
</body>
</html>
   
