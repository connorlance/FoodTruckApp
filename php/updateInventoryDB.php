<?php   
   $servername = "localhost";
   $username = "hci"; 
   $password = "hci";
   $dbname = "hci";
 
   $conn = new mysqli($servername, $username, $password, $dbname);

   $description = $_POST['description'];
   $quantity = $_POST['quantity'];
   $ID = $_POST['ID'];
  
   $query = "UPDATE item SET qty='$quantity', description='$description' WHERE iid='$ID'";
   $result = $conn->query($query);

   $select = "SELECT * FROM item";
   $result = $conn->query($select);  
 
   $conn->close(); // close the connection to the database
   header("Location: ../inventory.php");
exit;
?>