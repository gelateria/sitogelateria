<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" ><!--<![endif]-->
<html>
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatti</title>
    <!-- Fogli di stile -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/stili-custom.css" rel="stylesheet" media="screen">
    <link href="stilecontatti.css" type="text/css" rel="stylesheet" media="screen">

    <!-- Modernizr -->
    <script src="js/modernizr.custom.js"></script>
    <!-- respond.js per IE8 -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
   </head>
   <body>
    <?php //inclusione dell'header
     include 'header.php';
    ?>

    <div class="row">
      <section>
        <div class="container">

            <div class="col-xs-12 col-sm-8" class="mappa">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3023.2004052068837!2d14.56570557479239!3d40.73561558426273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x133bbea06581d003%3A0x11f92fe232494002!2sVia+Papa+Giovanni+XXIII%2C+12%2C+84012+Angri+SA!5e0!3m2!1sit!2sit!4v1428435857013" ></iframe>


            </div>
            <div class="col-xs-12 col-sm-4">
              <img src="img/logogelato.png" alt="Logo azienda" class="img-responsive">
                <br><br><br>
              <address>
                  <strong>iceCREAM</strong><br>
                  Via Papa Giovanni XXIII, 12<br>
                  Angri (SA), 84012, Italy<br>
                  Telefono/fax: 123 456-7890
              </address>
            </div>
          
        </div>
      </section>
    </div>

    <?php //inclusione del footer
     include 'footer.html';
    ?>

      
   
     <!-- jQuery e plugin JavaScript  -->
     <script src="http://code.jquery.com/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
   </body>
</html>