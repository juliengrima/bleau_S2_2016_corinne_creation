<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>CorinneCreation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

    <link type="text/css" rel="stylesheet" href="css/Main.css">

</head>

<body class="back">

    <div class="container">
        
        <div class="row containeur center">
            <div class="col m4 valign-wrapper">
                <div class="img-logo valign">
                    <a href="index.php"><img src="images/logo.png" class="img-logo"></a>
                </div>
                <div class="col s12 m12 l12 border col-margin">

                    <div class="row row-margin1">
                        <div class="">
                            <div class="lien">
                                <a href=""><span id="lien1" class="text-size">Mon histoire</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row row-margin">
                        <div class="col offset-m3 col-size">
                            <a href="mes_creations.php"><span id="lien2" class="text-size">Mes créations</span></a>
                        </div>
                    </div>
                    <div class="row row-margin">
                        <div class="col offset-m4 col-size">
                            <a href=""><span  class="text-size">Coin presse</span></a>
                        </div>
                    </div>
                    <div class="row row-margin">
                        <div class="col offset-m3">
                            <a href="eco_label.php"><span id="lien4" class="text-size">Eco-lablel</span></a>
                        </div>
                    </div>
                    <div class="row row-margin">
                        <div class="col offset-m2">
                            <a href=""><span id="lien5" class="text-size">Contact</span></a>
                        </div>
                    </div>
                </div> 
            </div>

        <div class="row center">
                <div class="carousel">
                    <!-- EVENEMENTS ET ATELIER -->
                    <?php require ('includes/slider.php');?>
                </div>
            </div>    
        </div>

        </div>

        

    </div>

    



       