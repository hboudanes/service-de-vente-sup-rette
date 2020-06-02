<?php defined("DB_HOST") ? null: define("DB_HOST","localhost");
defined("DB_USER") ? null: define("DB_USER","root");

defined("DB_PASS") ? null: define("DB_PASS","root");
defined("DB_NAME") ? null: define("DB_NAME","ecom");
defined("DB_PORT") ? null: define("DB_PORT","3307");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT); ?>
<?php
// Start the session
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./panier.css">
    <title>panier</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
          <h4>Panier</h4>
        </div>
      </div>

    <div class="container mt-3">
        <div class="row">
          <div class=" col-6 artic ">
            <p><b>ARTICLE</b></p>
          </div>
          <div class=" col-1 colc">
              <p><b>QUANTITÉ</b></p>
          </div>
          <div class=" col-2 colc">
            <p><b>PRIX UNITAIRE</b></p>
        </div>
        <div class=" col-2 colc">
            <p><b>SOUS-TOTAL</b></p>
      </div>
        </div>
      </div>




    <div class="container">
        <div class="row">
          <div class="cola col-1 ">
            <img src="./img/1.jpg" class="img mt-3">
          </div>
          <div class="cola col-5 border-right">
            <h6 class=" mt-3 ">Batterie pour Xiaomi Series (redmi note 5 Pro)</h6>
                <div class="rowc ml-4 mt-3">
                <div class="col-4 "><img src="./icon/like.png" class="icon"><a href="#" class="link">FAVORIS</a> </div>
                <div class="col-5 "><img src="./icon/bin.png" class="icon"> <a href="#" class="link">SUPPRIMER</a></div>
                    </div>
          </div>
          <div class="cola col-1 cent border-right">
            <select class="m-auto border-0">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
          </div>
          <div class="cola col-2 cent border-right">
              <h6 class="m-auto">100dh</h6>
        </div>
        <div class="cola col-2 cent cor">
            <h6 class="m-auto">100dh</h6>
      </div>
        </div>
      </div>
      <?php include("produit.php"); ?>
    <div class="container mt-5">
        <div class=" mt-5 rowc  ">
            <h6 >Total TTC:</h6>
            
            <h6 class="cor ml-5"><?php echo  $totalpp; ?></h6>
            <h6 class="cor">DHS</h6>
        </div>
    </div>
    <?php include("painerpr.php"); ?>
    <div class="container mt-4">
        <div class="totale row ">
            <button type="button" class="btn btn-outline-secondary mr-1">SUIVRE VOS ACHATS</button>
            <button type="button" class="btn btn-primary"  onclick="window.location.href='finalise.php'" >COMMANDE</button>
            <div class="col-3"></div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

<?php
// Set session variables
$_SESSION['painer']=$tr1;
 $_SESSION['prod']=$tr;
$_SESSION['prixpn']=  $prixpn;
$_SESSION['totalep']=$totalpp;
?>
<?php

 include("close.php");

  ?>