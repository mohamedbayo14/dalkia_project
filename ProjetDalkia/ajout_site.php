<!DOCTYPE html>
<html lang="en">
<head>
    <?php
/* Définition de la variable titre pour la page d'accueil */
      $titre_page="ajout_site";
      /* Inclusion de l'en-têtre */
      include 'header.php';?>
      <!-- Appel du header -->
      <?php include 'header_commercial.php';?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Ajout d'un site</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="BS_MultiStep_Form_Snippet/BS-MultiStepForm/assets/multistepform/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<h1>AJOUT D'UN SITE</h1>

<!-- MultiStep Form -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" action="ajout_site.inc.php" method="POST">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Informations sur le site</li>
                <li>Puissance souscrite</li>
                <li>Consommation</li>
                <li>R1 et R2</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Informations sur le site</h2>  
                <h3 class="fs-subtitle">Quelques détails sur le site</h3>
                <input type="text" name="Entreprise" placeholder="Nom de l'entreprise"/>
                <input type="text" name="Site" placeholder="Nom du site"/>
                <input type="text" name="Habitat" placeholder="Habitat"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Puissance souscrite</h2>
                <h3 class="fs-subtitle">Détail dans la souscription</h3>
                <input type="number" name="num_sous_station" placeholder="Numéro sous station"/>
                <input type="text" name="ps2015" placeholder="Puissance souscrite en 2015"/>
                <input type="text" name="ps2016" placeholder="Puissance souscrite en 2016"/>
                <input type="text" name="ps2017" placeholder="Puissance souscrite en 2017"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Puissance consommée</h2>
                <h3 class="fs-subtitle">Détails sur la consommation au niveau du site</h3>
                <input type="text" name="cs2011" placeholder="Consommation en 2011"/>
                <input type="text" name="cs2012" placeholder="Consommation en 2012"/>
                <input type="text" name="cs2013" placeholder="Consommation en 2013"/>
                <input type="text" name="cs2014" placeholder="Consommation en 2014"/>
                <input type="text" name="cs2015" placeholder="Consommation en 2015"/>
                <input type="text" name="cs2016" placeholder="Consommation en 2016"/>
                <input type="text" name="cs2017" placeholder="Consommation en 2017"/>
                <input type="button" name="ps" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
                
            </fieldset>
            <fieldset>
                <h2 class="fs-title">R1 et R2</h2> 
                <br>
                <input type="text" name="R1_2012" placeholder="R1 2012"/>
                <input type="text" name="R2_2012" placeholder="R2 2012"/>
                <input type="text" name="R1R2_2012" placeholder="R1+R2 2012"/>
                <input type="text" name="R1_2013" placeholder="R1 2013"/>
                <input type="text" name="R2_2013" placeholder="R2 2013"/>
                <input type="text" name="R1R2_2013" placeholder="R1+R2 2013"/>
                <input type="text" name="R1_2014" placeholder="R1 2014"/>
                <input type="text" name="R2_2014" placeholder="R2 2014"/>
                <input type="text" name="R1R2_2014" placeholder="R1+R2 2014"/>
                <input type="text" name="R1_2015_1st" placeholder="R1 2015 1st periode"/>
                <input type="text" name="R2_2015_1st" placeholder="R2 2015 1st periode"/>
                <input type="text" name="R1R2_2015_1st" placeholder="R1+R2 2015 1st periode"/>
                <input type="text" name="R1_2015_2nde" placeholder="R1 2015 2nde periode"/>
                <input type="text" name="R2_2015_2nde" placeholder="R2 2015 2nde periode"/>
                <input type="text" name="R1R2_2015_2nde" placeholder="R1+R2 2015 2nde periode"/>
                <input type="text" name="R1R2_2015" placeholder="R1+R2 2015"/>
                <input type="text" name="R1_2016" placeholder="R1 2016"/>
                <input type="text" name="R2_2016" placeholder="R2 2016"/>
                <input type="text" name="R1R2_2016" placeholder="R1+R2 2016"/>
                <input type="text" name="R1_2017" placeholder="R1 2017"/>
                <input type="text" name="R2_2017" placeholder="R2 2017"/>
                <input type="text" name="R1R2_2017" placeholder="R1+R2 2017"/>

                <input type="submit" name="submit" value="Submit"/>
            </fieldset>
        </form>
        <!-- link to designify.me code snippets -->
        <!-- <div class="dme_link">
            <p><a href="http://designify.me/code-snippets-js/" target="_blank">More Code Snippets</a></p>
        </div> -->
        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="BS_MultiStep_Form_Snippet/BS-MultiStepForm/assets/multistepform/js/msform.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
