<?php defined("DB_HOST") ? null: define("DB_HOST","localhost");
defined("DB_USER") ? null: define("DB_USER","root");

defined("DB_PASS") ? null: define("DB_PASS","root");
defined("DB_NAME") ? null: define("DB_NAME","ecom");
defined("DB_PORT") ? null: define("DB_PORT","3307");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT); 


function query($sql){
    global $conn;
    return mysqli_query($conn, $sql);
}
function confirm($result){
    global $conn;
    if(!$result){
        die("Query Failed".mysqli_error($conn));
    }
}
function fetch_array($result){
    return mysqli_fetch_assoc($result);
}
function escape_string($string){
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>chri hani</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 
    <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">chri hani</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="categories.php">Shop</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                     <li>
                        <a href="panier.php">checkout</a>
                    </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        
    </nav>

    <!-- Page Content -->
    <div class="container">
        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Product</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a></p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
        <?php 
            $query = query("SELECT * FROM produit WHERE id_ca=". escape_string($_GET['id'])." ");
            confirm($query);
            while($row = fetch_array($query)){
                $product = <<<DELIMETER
                    <div class="col-md-3 col-sm-6 hero-feature">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['ID_pro']}"><img src="{$row['img']}" alt=""></a>
                            <div class="caption">
                                <h3>{$row['nom']}</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <p>
                                    <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['ID_pro']}" class="btn btn-default">More Info</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    DELIMETER;
        
                echo $product;
            }
        ?>

        </div>
        <hr>

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2030</p>
        </div>
    </div>
</footer>


</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
    </div>