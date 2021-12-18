<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMI Toolbox</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="medias/logoWhite.png">

    <!-- CSS -->
    <link rel="stylesheet" href="styles.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- JS & JQuery & AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="app.js"></script>

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/e6c960569c.js" crossorigin="anonymous"></script>

</head>

<body onscroll="shrink()" id="all">
    <section class="menu">
        <a href="index.php"><img id="logo" src="medias/logoWhite.png" alt="Accueil"></a>
        <nav>
            <li class="activePage"><a href="index.php">Accueil</a></li>
            <li><a href="dev.html">Développement</a></li>
            <li><a href="graphisme.html">Graphisme</a></li>
            <li><a href="communication.html">Communication</a></li>
            <li><a href="gestion.html">Divers</a></li>
        </nav>
    </section>

    <section class="browse">

        <section class="bandeau">
            <div class="roller">
                <span id="rolltext">De MMI<br>
                    Par MMI<br>
                    Pour MMI<br>
            </div>
        </section>

        <h1>MMI Toolbox</h1>
        <hr>
        <h2>Choisis ton domaine</h2>
        <div class="grille">
            <div class="block">
                <i class="far fa-file-code"></i>
                <h4>Développement</h4>
                <a href="dev.html">Explorer</a>
            </div>
            <div class="block">
                <i class="fas fa-pencil-alt"></i>
                <h4>Graphisme</h4>
                <a href="graphisme.html">Explorer</a>
            </div>
            <br>
            <div class="block">
                <i class="fas fa-bullhorn"></i>
                <h4>Communication</h4>
                <a href="communication.html">Explorer</a>
            </div>
            <div class="block">
                <i class="fas fa-box-open"></i>
                <h4>Divers</h4>
                <a href="gestion.html">Explorer</a>
            </div>
        </div>
    </section>

    <section id="reco" class="yourTurn" ng-app=""
        ng-init="titre='Titre du site';categorie='dev';resume='Bref résumé';pointFort1='Point fort n°1';pointFort2='Point fort n°2';">
        <h2>À vous de jouer !</h2>
        <hr>
        <h3>Une adresse à conseiller ?</h3>

        <div class="column">

            <section class="formulaire">

                <!-- =========== FORMULAIRE ========== -->
                <form action="test-db.php" method="GET">
                    <fieldset>
                        <legend> Votre recommandation </legend>
                        <!-- Titre -->
                        <label for="titre" class="formTitle">Titre <span>*</span></label><br>
                        <input ng-model="titre" id="titre" type="text" required><br>

                        <!-- Résumé -->
                        <label for="resume" class="formTitle">Résumé <span>*</span></label><br>
                        <input ng-model="resume" id="resume" type="text" required><br>

                        <!-- Catégorie-->
                        <label for="categorie" class="formTitle">Catégorie <span>*</span></label><br>

                        <input ng-model="categorie" type="radio" name="categorie" value="dev" required>
                        <label for="dev">Dév</label>

                        <input ng-model="categorie" type="radio" name="categorie" value="graphisme" required>
                        <label for="graphisme">Graphisme</label>

                        <input ng-model="categorie" type="radio" name="categorie" value="comm" required>
                        <label for="comm">Comm'</label>

                        <input ng-model="categorie" type="radio" name="categorie" value="divers" required>
                        <label for="divers">Divers</label><br><br>


                        <!-- Résumé -->
                        <label for="pointFort1" class="formTitle">Point fort n°1 <span>*</span></label><br>
                        <input ng-model="pointFort1" id="pointFort1" type="text" required><br>

                        <label for="pointFort2" class="formTitle">Point fort n°2 <span>*</span></label><br>
                        <input ng-model="pointFort2" id="pointFort2" type="text" required><br>

                        <label for="pointFort3" class="formTitle">Point fort n°3 </label><br>
                        <input ng-model="pointFort3" id="pointFort3" type="text"><br><br>


                        <label for="url" class="formTitle"><i class="fas fa-link"></i> URL du site
                            <span>*</span></label><br>
                        <input ng-model="url" id="url" type="text" required>

                        <!-- Submit-->
                        <button type="submit"><i class="fas fa-paper-plane"></i> Envoyer</button>

                    </fieldset>
                </form>
            </section>

            <!-- Prévisualisation -->
            <div class="example">
                <h2>Prévisualisation</h2>
                <div class="bail show" id="coolors">
                    <div class="fond"></div>
                    <div class="slide falseSlide">
                        <h4 class="etud">{{ titre }}</h4>
                        <div class="keywordList">
                            <p class="strong">{{ categorie }}</p>
                        </div>
                        <em>{{ resume }}</em>
                        <p>
                            <li>{{ pointFort1 }}</li>
                            <li>{{ pointFort2 }}</li>
                            <li>{{ pointFort3 }}</li>
                        </p>
                        <a href="{{ url }}" target="_blank">Découvrir</a>
                        <br><br><br>
                    </div>
                </div>

            </div>

        </div>
    </section>



    <footer>
        <p>2021 — Anna Maria Lannaud 
            <a href="mailto:am.lannaud@gmail.com" target="_blank" class="SoMe" alt="Envoyer un mail"><i class="fas fa-at"></i></a>
            <a href="https://www.linkedin.com/in/anna-maria-lannaud-a391671ba/" target="_blank" class="SoMe" alt="Compte LinkedIn"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.behance.net/anna-malannaud" target="_blank" class="SoMe" alt="Compte Behance"><i class="fab fa-behance-square"></i></a>
        </p>
    </footer>

     <?php
/*
    $db = new PDO( 'mysql:host=localhost; dbname=mmitoolbox; port=8889; charset=utf8', 'root', 'root'); */

    /* ————————— REQUETE TYPE A —————————*/
  /*  $titre=$_GET["titre"];
    $resume=$_GET["resume"];

    $categorie=$_GET["categorie"];

    $pointFort1=$_GET["pointFort1"];
    $pointFort2=$_GET["pointFort2"];
    $pointFort3=$_GET["pointFort3"];

    $url=$_GET["url"]; 

    $sql="INSERT INTO `mmiform` (`titre`, `resume`, `categorie`, `pointFort1`, `pointFort2`, `pointFort3`, `url` ) VALUES ('$titre', '$resume', '$categorie', '$pointFort1', '$pointFort2', '$pointFort3', '$url');";

    $req = $link->query($sql); */

    /* ————————— RECHERCHE DE LIEN —————————*/
   /* $plz= "SELECT titre FROM mmiform";
    $ok = $link -> query($plz);
    $info=$ok->fetch(PDO::FETCH_ASSOC);
    echo $info ; */
    /* ——————————————————*/


    /* ————————— REQUETE TYPE B —————————*/
    /* $sql = "INSERT INTO mmiform(titre,resume,categorie,pointFort1,pointFort2,pointFort3,url) VALUES (:titre,:resume,:categorie,:pointFort1,:pointFort2,:pointFort3,:url)";

    $req = $link -> prepare($sql);

    $req -> execute(array(":titre" => $_GET["titre"],":resume" => $_GET["resume"],":categorie" => $_GET["categorie"],":pointFort1" => $_GET["pointFort1"],":pointFort2" => $_GET["pointFort3"],":url" => $_GET["url"]));
    $req = null; */
    /* ——————————————————*/


    /* if($req) {
    echo "Executed";
    } else {
    echo "Error";
    } */
    ?>
</body>

</html>