<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>CorinneCreation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Changa+One|Crete+Round|Days+One|Fredoka+One|Nunito|Pinyon+Script" rel="stylesheet">

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
                    <a href="index.php"><img src="images/logo.png" alt="CorinneCreation" class="img-logo"></a>
                </div>
                <div class="col s12 m12 l12 col-margin">
                    <div class="col s12 m12 l12 col-margin" id="navCC">

                        <div class="row row-margin1">
                            <div>
                                <div class="lien">
                                    <a href="parcours.php"><span id="idMonHistoire" class="navTextCC">Mon hist oire</span></a>
                                </div>
                            </div>
                        </div>                    
                        <div class="row row-margin">
                            <div class="col offset-m3 col-size">
                                <a href="mes_creations.php"><span id="idMesCreations" class="navTextCC">Mes créations</span></a>
                            </div>
                        </div>
                        <div class="row row-margin">
                            <div class="col offset-m4 col-size">
                                <a href=""><span  class="navTextCC">Coin presse</span></a>
                            </div>
                        </div>
                        <div class="row row-margin">
                            <div class="col offset-m3">
                                <a href="eco_label.php"><span id="idEcoLabel" class="navTextCC">Eco-lablel</span></a>
                            </div>
                        </div>
                        <div class="row row-margin">
                            <div class="col offset-m3">
                                <a href="contact.php"><span id="idContact" class="navTextCC">Contact</span></a>
                            </div>
                        </div>

                    </div> 
                </div>  
            </div>
        </div>


        <div class="row center">
            <div class="carousel">
                <!-- EVENEMENTS ET ATELIER -->
                <?php require ('includes/slider.php'); ?>
            </div>
        </div>    
    </div>





