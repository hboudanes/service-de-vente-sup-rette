<?php include("server.php"); ?>
<?php 
 session_start();
 for($l=0;$l<count($_SESSION['prod']);$l++){
   
    $pay = "UPDATE commande SET pay=1 WHERE ID_com=" . $_SESSION['prod'][$l];

    if ($conn->query($pay) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
 }
 for($l=0;$l<count($_SESSION['painer']);$l++){
   
    $pay = "UPDATE commande SET pay=1 WHERE ID_com=" . $_SESSION['painer'][$l];

    if ($conn->query($pay) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
 }
 
?>  
<?php
$datee = $_GET['expyear'] . "-" . $_GET['expmonth'] . "-" . "01";

$pay = "INSERT INTO pay (Date_exp, ID_client,nom_cart,cvv,prix_T,Num_cart)
VALUES ('" . $datee . "', '2','" . $_GET['cardname'] . "','" . $_GET['cvv'] . "','" . $_GET['prixt'] . "','" . $_GET['cardnumber'] . "')";

if ($conn->query($pay) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: panier.php');
exit();
?>

 <?php include("close.php"); ?>