<?php defined("DB_HOST") ? null: define("DB_HOST","localhost");
defined("DB_USER") ? null: define("DB_USER","root");

defined("DB_PASS") ? null: define("DB_PASS","root");
defined("DB_NAME") ? null: define("DB_NAME","ecom");
defined("DB_PORT") ? null: define("DB_PORT","3307");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT); ?>

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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="homepage.php">chri hani</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="shop.php">Shop</a>
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
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- sidebar -->

            <div class="col-md-3">
                <p class="lead">Categories</p>
                <div class="list-group">
                    <?php   
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

                $query = query("SELECT * FROM catégorie");
                confirm($query);
            
                while($row= fetch_array($query)){
                    $category = <<<DELIMETER
                    <a href="categories.php?id={$row['id_cat']}" class="list-group-item">{$row['desc']}</a>
                    DELIMETER;
                    echo $category;
                }
            
            
        ?>
                </div>
            </div>


            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <?php //echo $_SESSION["product_1"]; 
    $query = query("SELECT * FROM produit");
    confirm($query);

    while($row = fetch_array($query)){ ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href="item.php?id=<?php echo $row['ID_pro'] ?>"><img width=100 src="<?php echo $row['img'] ?>" alt=""></a>
            <div class="caption">
                <h4 class="pull-right"><?php echo $row['prix'] ?>dh</h4>
                <h4><a href="item.php?id={$row['ID_pro']}"><?php echo $row['nom']; ?></a>
                </h4>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum incidunt neque blanditiis eum velit.</p>
                <a class="btn btn-primary" target="_blank" href="panier.php?add=<?php echo $row['ID_pro']?>">Chri hani</a>
                <a href="item.php?id=<?php echo $row['ID_pro']?>" class="btn btn-default">More Info</a>

            </div>
        </div>
    </div>
   <?php
}?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this Product?</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum incidunt neque blanditiis eum
                            velit accusantium a ea. Fugit natus quis non, rem adipisci est, sunt culpa animi, eius ullam
                            accusamus.</p>
                        <a class="btn btn-primary" target="_blank" href="">Chri hani</a>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">
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