<!DOCTYPE html>
<html>
    <head>
        <title>FaisTonPlein - Recherche de stations essences</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="themes/theme.min.css" />
        <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/javascript" src="http://dev.jtsage.com/cdn/simpledialog/latest/jquery.mobile.simpledialog2.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBT1WCVABSlr_hfqdriNXDvj6-adFIyrdY"></script>
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="themes/style.css" />
    </head>
    <body>
        <div data-role="page" data-theme="f" id="home">
            <div role="main" class="ui-content">
                <img id="logo" src="img/logo.png" alt="FaisTonPlein">
                <a href="#map" class="ui-btn">Get Started</a>
                <a href="#connexion" class="ui-btn">Connexion</a>
                <a href="#inscription" class="ui-btn">Inscription</a>
            </div>
        </div>
        <div data-role="page" id="connexion" data-theme="c">
            <div data-role="header">
                <div data-role="navbar" data-theme="c">
                    <ul class="navbar">
                        <li>Connexion</li>
                        <li><a href="index.php" data-role="tab" data-transition="slide" data-back="true" data-icon="back"></a></li>
                    </ul>
                </div>
            </div>
            <div role="main" class="ui-content">
            	<div id="log"></div>
            	<form method="POST" id="form" name="form" action="connexion.php">
                	Login :
                    <input id="login" name="login" type="text" />
                    Mot de passe :
                    <input id="mdp" name="mdp" type="password" />
                    <input type="submit" id="sub" value="Se connecter" data-theme="b" />
                </form>
            </div>
        </div>
        <div data-role="page" id="inscription" data-theme="a">
            <div data-role="header" data-theme="c">
                <div data-role="navbar" data-theme="c">
                    <ul class="navbar">
                        <li>Inscription</li>
                        <li><a href="index.php" data-role="tab" data-transition="slide" data-back="true" data-icon="back"></a></li>
                    </ul>
                </div>
            </div>
            <div role="main" class="ui-content">
            	<div id="log2"></div>
            	 <form method="POST" id="form2" name="form2" action="inscription.php">
                	Login :
                    <input id="login" name="login" type="text" />
                    Mot de passe :
                    <input id="mdp" name="mdp" type="password" />
                    Email :
                    <input id="mail" name="mail" type="email" />
                    Type de Carburant :
                    <select id="select-native-2" name="carb">
                        <option value="0">Choisir..</option>
                    </select>
                    <input type="submit" id="sub" value="S'inscrire" data-theme="b" />
                </form>
            </div>
        </div>
        <div data-role="page" id="map" data-theme="c">
            <div data-role="header">
                <div data-role="navbar" data-theme="c">
                    <ul class="navbar">
                        <li>A proximité</li>
                        <li><a href="#proxi" data-role="tab" data-transition="slide" data-icon="search" data-theme="d"></a></li>
                        <li><a href="#comparateur" data-role="tab" data-transition="slide" data-icon="info" data-theme="e"></a></li>
                        <li><a href="index.php" data-role="tab" data-transition="slide" data-back="true" data-icon="back"></a></li>
                    </ul>
                </div>
            </div>
            <div id="map-canvas"></div>
        </div>
        <div data-role="page" id="proxi" data-theme="a">
            <div data-role="header" data-theme="c">
                <div data-role="navbar">
                    <ul class="navbar">
                        <li>Recherche</li>
                        <li><a href="#map" data-role="tab" data-rel="back" data-icon="back"></a></li>
                    </ul>
                </div>
            </div>
            <div role="main" class="ui-content">
                <form id="formRec" action="#map">
                	<div id="message"></div>
                    <label for="slider-fill">Rechercher une ville :</label>
                    <form class="ui-filterable">
                        <input id="autocomplete-input" data-type="search" placeholder="Ville, code postal...">
                    </form>
                    <ul id="autocomplete" data-role="listview" data-inset="true" data-filter="true" data-filter-reveal="true" data-input="#autocomplete-input">
                    </ul>
                    <label for="slider-fill">Distance en KM :</label>
                    <input type="range" name="slider-fill" id="slider-fill" value="40" min="0" max="100" step="1" data-highlight="true">
                    <label for="slider-fill">Type de carburant :</label>
                    <select name="select-native-1" id="select-native-1">
                        <option value="0">indéfini</option>
                    </select>
                    <fieldset data-role="controlgroup">
                        <legend>Service :</legend>
                        <input name="checkbox-v-2a" id="checkbox-v-2a" type="checkbox">
                        <label for="checkbox-v-2a">Automate CB</label>
                        <input name="checkbox-v-2b" id="checkbox-v-2b" type="checkbox">
                        <label for="checkbox-v-2b">Station gonflage</label>
                    </fieldset>
                    <input id="rechercher" type="submit" value="Rechercher" class="ui-btn" data-theme="b">
                </form>
            </div>
        </div>
        <div data-role="page" id="comparateur" data-theme="a">
            <div data-role="header" data-theme="c">
                <div data-role="navbar">
                    <ul class="navbar">
                        <li>Comparateur</li>
                        <li><a href="#map" data-role="tab" data-rel="back" data-icon="back"></a></li>
                    </ul>
                </div>
            </div>
            <div role="main" class="ui-content">
                <table data-role="table" data-mode="columntoggle" class="ui-responsive">
                </table>
            </div>
        </div>
        <div data-role="page" id="station" data-theme="a">
            <div data-role="header" data-theme="c">
                <div data-role="navbar">
                    <ul class="navbar">
                        <li>Station</li>
                        <li><a href="#map" data-role="tab" data-rel="back" data-icon="back"></a></li>
                    </ul>
                </div>
            </div>
            <div role="main" class="ui-content">
                <img id="imgMap"/>
                <p class="right"></p>
                <table data-role="table" data-mode="columntoggle" class="ui-responsive"></table>
                <input id="itineraire" type="button" value="Itinéraire" class="ui-btn" data-theme="b">
            </div>
        </div>
    </body>
</html>