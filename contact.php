<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <link href="https://fonts.googleapis.com/css?family=Changa+One|Crete+Round|Days+One|Fredoka+One|Nunito|Pinyon+Script" rel="stylesheet">

        <!--<link href="css/Main.css" rel="stylesheet" type="text/css"/>-->
        <link href="css/contact.css" rel="stylesheet" type="text/css"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    </head>

    <body  id="body-contact" class="white">

        <header>
           

            <nav class="black">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo center white-text">Contactez-nous</a>
         
                </div>
            </nav>

        </header>


        <main role="main" id="main-contact">

            <div id="form-contact">
 
                <div class="container" >
                    <div class="row">
                        <form class="col s12 z-depth-5">
                            <fieldset id="fieldset-contact">
                                <legend>Vos coordonnées</legend>

                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix white-text">perm_identity</i>
                                        <input id="prenom" type="text" class="validate black-text"  autofocus required="" >
                                        <label for="prenom">Prénom</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix  white-text">perm_identity</i>
                                        <input id="nom" type="text" class="validate black-text" required="">
                                        <label for="nom">Nom</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">    
                                        <i class="material-icons prefix  white-text">phone</i>
                                        <input id="telephone" type="tel" class="validate black-text">
                                        <label for="telephone">Téléphone</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix  white-text">email</i>
                                        <input id="email" type="email" class="validate black-text">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix white-text">mode_edit</i>
                                        <textarea  class="materialize-textarea black-text" name="textarea1" id="" cols="30" rows="10"> </textarea>
                                        <label for="textarea1">Votre message</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <button class="btn waves-effect waves-light col s12 offset-m2 m2 black white-text" type="submit" name="submit_action">Envoyer
                                        <i class="material-icons right">send</i>
                                    </button>


                                    <button class="btn waves-effect waves-light col s12 offset-m4 m2 black white-text " type="reset" name="reset_action">Annuler
                                        <i class="material-icons right">loop</i>
                                    </button>

                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>


            </div>      
        </main>


        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script src="js/contact.js" type="text/javascript"></script>

    </body>
</html>