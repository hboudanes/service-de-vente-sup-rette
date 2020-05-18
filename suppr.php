<?php include("server.php"); ?>

<?php 
echo "id_com " . $_GET['id_com'] ;
$del = "UPDATE commande SET id_pro=null  WHERE ID_com=" . $_GET['id_com'] . "&&" . "id_client=" . 2  ;
if ($conn->query($del) === TRUE) {
  echo "Record update successfully";
} else {
  echo "Error update record: " . $conn->error;
}
header('Location: panier.php');
exit();
?>
 <?php include("close.php"); ?>