<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" href="css/Main.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body id="access-body">

<header>

    <nav>
        <div class="col s12">
            <div class="navac-wrapper orange">
                <a href="#" class="brandac-logo">Gestion des oeuvres :</a>
            </div>
        </div>
    </nav>
</header>


<main role="main">


    <div id="access-form">

        <div class="container">
            <div class="row">
                <form class="col s12 z-depth-5">
                    <div class="row">
                        <div class="input-field col s12 offset-m3 m6">
                            <i class="material-icons prefix orange-text">account_circle</i>
                            <input id="icon_prefix" type="text" class="validate" autofocus required>
                            <label for="icon_prefix">Identification</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 offset-m3 m6">
                            <i class="material-icons prefix orange-text">verified_user</i>
                            <input id="icon_verified_user" type="tel" class="validate" required>
                            <label for="icon_verified_user">Mot de passe</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 offset-m3 m2 ">
                            <button class="waves-effect waves-light btn orange" type="reset" name="reset_action">Annuler</button>
                        </div>
                        <div class="col s12 offset-m2 m2 ">
                            <button class="waves-effect waves-light btn orange" type="submit" name="submit_action">Valider
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</main>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>