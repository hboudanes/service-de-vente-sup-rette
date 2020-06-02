<?php defined("DB_HOST") ? null: define("DB_HOST","localhost");
defined("DB_USER") ? null: define("DB_USER","root");

defined("DB_PASS") ? null: define("DB_PASS","root");
defined("DB_NAME") ? null: define("DB_NAME","ecom");
defined("DB_PORT") ? null: define("DB_PORT","3307");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT); 
?>
<?php
$comd = "SELECT * FROM commande ";
$result = mysqli_query($conn,$comd); //mysqli($conn,$pro)
if (!$result) {
  echo 'error in query1';
}
?>
<?php
$t=0;
$r=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($row["pay"] == 0 && $row["id_pan"] != null) {
      $tr1[$t] =$row["ID_com"];
      $t++;
    }
    if ($row["pay"] == 0) {
    
   
     $painer = "SELECT * FROM panier_fixe where ID_panier =" . $row["id_pan"];
     $resr = $conn->query($painer); //mysqli($conn,$pro)
     if (!$resr ) {
      
     }else{
      
     while($row1 = $resr->fetch_assoc()){
      $prixpn[$r]=$row1["prix"];
      $r++;
        echo "<?php include('close.php') ?>
        <div class='container'>
                <div class='row'>
                  <h4>Panier" . $row1["ID_panier"] . "</h4>
                </div>
              </div> ";
          for(    $i=1; $i<4 ;$i++){
        $prod1 = "SELECT * FROM produit where id_pro ="  . $row1["id_pro" . $i] ;
        $res1 = $conn->query($prod1); //mysqli($conn,$pro)
        while($row2 = $res1->fetch_assoc()) {
         echo "
         <div class='container'>
        <div class='row'>
          <div class='cola col-1 '>
            <img src='./img/1.jpg' class='img mt-3'>
          </div>
          <div class='cola col-5 border-right'>
            <h6 class=' mt-3 '>" . $row2["nom"] ."</h6>
                <div class='rowc ml-4 mt-3'>
                <div class='col-4 '><img src='./icon/like.png' class='icon'><a href='#' class='link'>FAVORIS</a> </div>
                <div class='col-5 '><img src='./icon/bin.png' class='icon'> <a href='#' class='link'>SUPPRIMER</a></div>
                    </div>
          </div>
          <div class='cola col-1 cent border-right'>
            <select class='m-auto border-0'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
          </div>
          <div class='cola col-2 cent border-right'>
              <h6 class='m-auto'>" . $row2["prix"] . "DH" . "</h6>
        </div>
        <div class='cola col-2 cent cor'>
            <h6 class='m-auto'></h6>
      </div>
        </div>
      </div>
  
         "  ;
        }
      }
        echo "<div class='container mt-5'>
        <div class=' mt-5 rowc  '>
            <h6 >Total TTC:</h6>
            <h6 class='cor ml-5'>" . $row1["prix"] . "</h6>
            <h6 class='cor'>DHS</h6>
        </div>
    </div> ";
    
        }
     
     }
     }
    }
 }
 else {
   echo "0 results";
 }

?>  




    