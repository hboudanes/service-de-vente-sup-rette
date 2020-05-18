<?php include("server.php"); ?>
<?php 
 session_start();
//  for($l=0;$l<count($_SESSION['prod']);$l++){
   
//     $pay = "UPDATE commande SET pay=1 WHERE ID_com=" . $_SESSION['prod'][$l];

//     if ($conn->query($pay) === TRUE) {
//       echo "Record updated successfully";
//     } else {
//       echo "Error updating record: " . $conn->error;
//     }
//  }
 for($l=0;$l<count($_SESSION['painer']);$l++){
   
    $pay = "UPDATE commande SET pay=1 WHERE ID_com=" . $_SESSION['painer'][$l];

    if ($conn->query($pay) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
 }
 
?>  


 <?php include("close.php"); ?>