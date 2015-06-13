<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chi Siamo</title>
        <!-- Fogli di stile -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/stili-custom.css" rel="stylesheet" >
        <link href="stile.css" rel="stylesheet" type="text/css">

        <!-- Modernizr -->
        <script src="js/modernizr.custom.js"></script>
        <!-- respond.js per IE8 -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    <body>
    <div class="col-sm-12">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button data-target=".navbar-responsive-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand glyphicon glyphicon-king"></span>
                </div>

                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <button type="button" class="btn btn-default btn-lg">
                                <span><a href="index.php"><img src="img/logogelato.png" alt="Home" width="100px"></a>
                            </button>
                        </li>

                        <li><a href="chisiamo.php">Chi Siamo</a></li>
                        <li><a href="catalogo.php">Catalogo</a></li>
                        <li><a href="formgelato.php">Ordina</a></li>
                        <li><a href="contatti.php">Contatti</a></li>
                        <li><a href="certificazione.php">Certificazioni</a></li>
                        <li><a href="formregistrazione.php">Registrati</a></li>

                        </li>
                    </ul>


                <?php
                include('loginam.php');
                ?>

                </div><!-- /.nav-collapse -->
            </div>
        </nav>
    </div>
    </body>
</html>
