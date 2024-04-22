<?php   
   //connect to database
   $servername = "localhost";
   $username = "hci"; 
   $password = "hci";
   $dbname = "hci";
   $conn = new mysqli($servername, $username, $password, $dbname);

   //get variables
   $description = $_POST['item'];
   $quantity = $_POST['quantity'];
   $ID = $_POST['ID'];
  
   //update item table with qty and description using iid
   $query = "UPDATE item SET qty='$quantity', description='$description' WHERE iid='$ID'";
   $result = $conn->query($query);

   //send back to inventory page
   header("Location: ../inventory.php");
exit;
?>