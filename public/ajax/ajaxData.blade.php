<?php

   $dbHost = '127.0.0.1';
   $dbUsername = 'root';
   $dbPassword = '';
   $dbName = 'pickbazar';

   //Connect and select the database
   $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


   if(isset($_POST["category_id"])){
       //Get all state data
      $category_id = $_POST["category_id"];

       $query = $db->query("SELECT * FROM sub_categories WHERE  category_id = '$category_id' ORDER BY category_id ASC");
       
       //Count total number of rows
       echo $rowCount = $query->num_rows;
       
       //Display states list
       if($rowCount > 0){
           echo '<option value="">Select Now</option>';
           while($row = $query->fetch_assoc()){ 
               echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
           }
       }else{
           echo '<option value="">No Sub Category name available</option>';
       }
   }

?>