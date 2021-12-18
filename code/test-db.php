<?php

$dbh = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), getenv('MYSQL_DATABASE'));

if (!$dbh) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//OK il y a bien la connection sur la base de données. Houra!
echo "Success story: A proper connection to MySQL was made! The docker database is great." . PHP_EOL;
echo "<hr>";

//----------------------------------------------------------------------
// Est ce qu'il s'agit d'un GET d'ajout d'une fiche?
// oui si tous ces attributs (meme vide) sont définis:
// "titre"
// "resume"
// "categorie"
// "pointFort1"
// "pointFort2"
// "pointFort3"
// "url"
//----------------------------------------------------------------------
if ( isset($_GET['titre']) && isset($_GET['resume']) && isset($_GET['categorie']) && isset($_GET['pointFort1']) && isset($_GET['pointFort2']) && isset($_GET['pointFort3']) && isset($_GET['url']) ){

  //C'est bien une demande d'ajout de fiche
  $titre=$_GET['titre'];
  $resume=$_GET['resume'];
  $categorie=$_GET['categorie'];
  $pointFort1=$_GET['pointFort1'];
  $pointFort2=$_GET['pointFort2'];
  $pointFort3=$_GET['pointFort3'];
  $url=$_GET['url'];

  $erreurMessage='';
  //Un peu de SECU; filtrage des tentatives d'injection SQL
// Nom	Type
// id	        int(255)  <- Auto-Increment de Mysql
// titre	    varchar(50)
// resume	    varchar(50)
// categorie	varchar(10)
// pointFort1	varchar(50)
// pointFort2	varchar(50)
// pointFort3	varchar(50)
// url	      varchar(200)


// titre	    varchar(50)
if( strlen($titre) > 50 ) { $erreurMessage = "Le titre est trop long."; }

// resume	    varchar(50)
if(strlen($resume) > 50) {$erreurMessage .= "Le résumé est trop long.";}
// categorie	varchar(10)
if(strlen($categorie) > 10) {$erreurMessage .= "La catégorie est trop longue.";}
// pointFort1	varchar(50)
if(strlen($pointFort1) > 50) {$erreurMessage .= "Le pointFort1 est trop long.";}
// pointFort2	varchar(50)
if(strlen($pointFort2) > 50) {$erreurMessage .= "Le pointFort2 est trop long.";}
// pointFort3	varchar(50)
if(strlen($pointFort3) > 50) {$erreurMessage .= "Le pointFort3 est trop long.";}
// url	      varchar(200)
if(strlen($url) > 200) {$erreurMessage .= "L'url est trop longue.";}

// Vérifie le format de l'URL
// ^(https?|ftp)://(-\.)?([^\s/?\.#-]+\.?)+(/[^\s]*)?$

if (!preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) { 
    $erreurMessage .= "L'url n'a pas le bon format"; 
}

// Test si il y a eu un message d'erreur
if(strlen($erreurMessage)>0){
  // il y a eu une ou plusieurs erreurs
  echo "Error: $erreurMessage." . PHP_EOL;
  exit;
}

// Les attributs du formulaire ont été tous validés
// https://www.w3schools.com/php/func_mysqli_prepare.asp
// http://localhost:9080/test-db.php?titre=titre4&resume=resume+4&categorie=comm&pointFort1=point+1&pointFort2=point+2&pointFort3=point+3&url=https%3A%2F%2Fen.unesco.org%2F
  $id=0;
  // id	int(255)
  // titre	varchar(50)
  // resume	varchar(50)
  // categorie	varchar(10)
  // pointFort1	varchar(50)
  // pointFort2	varchar(50)
  // pointFort3	varchar(50)
  // url	varchar(200)
  
  //INSERT INTO `mmiform` (`id`, `titre`, `resume`, `categorie`, `pointFort1`, `pointFort2`, `pointFort3`, `url`) VALUES (NULL, 'titre', 'resume', 'catégorie', 'point fort 1', 'point fort 2', 'point fort 3', 'http://wwww.unesco.org');
  //PB a resoudre: ci-dessous la Query est vulnérable aux injections SQL. 
    if($stmt = $dbh->prepare("INSERT INTO `mmiform` (`id`, `titre`, `resume`, `categorie`, `pointFort1`, `pointFort2`, `pointFort3`, `url`) VALUES (NULL,'$titre','$resume','$categorie','$pointFort1','$pointFort2','$pointFort3', '$url')")){
    //$stmt->bind_param($titre,$resume,$categorie,$pointFort1,$pointFort2,$pointFort3, $url);
    $stmt->execute();
  }
  else {
   //error !! don't go further
   var_dump($dbh->error);
  }
}

//----------------------------------------------------------------------
// Est ce qu'il s'agit d'un effacement d'une fiche
//----------------------------------------------------------------------

//----------------------------------------------------------------------
// Affichage de toutes les fiches
//----------------------------------------------------------------------

$sql = "SELECT id, titre,resume,categorie,pointFort1,pointFort2,pointFort3,url  FROM mmiform";
$result = $dbh->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - titre: " . $row["titre"]. " - resume: " . $row["resume"]." - categorie: ".$row["categorie"]."<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($dbh);
?>
<hr>
<!-- =========== FORMULAIRE ========== -->
<form action="test-db.php" method="GET">
                    <fieldset>
                        <legend> Votre recommandation </legend>
                        <!-- Titre -->
                        <label for="titre" class="formTitle">Titre <span>*</span></label><br>
                        <input ng-model="titre" name="titre" id="titre" type="text" required><br>

                        <!-- Résumé -->
                        <label for="resume" class="formTitle">Résumé <span>*</span></label><br>
                        <input ng-model="resume" name="resume" id="resume" type="text" required><br>

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
                        <input ng-model="pointFort1" name="pointFort1" id="pointFort1" type="text" required><br>

                        <label for="pointFort2" class="formTitle">Point fort n°2 <span>*</span></label><br>
                        <input ng-model="pointFort2" name="pointFort2" id="pointFort2" type="text" required><br>

                        <label for="pointFort3" class="formTitle">Point fort n°3 </label><br>
                        <input ng-model="pointFort3" name="pointFort3" id="pointFort3" type="text"><br><br>


                        <label for="url" class="formTitle"><i class="fas fa-link"></i> URL du site
                            <span>*</span></label><br>
                        <input ng-model="url" name="url" id="url" type="text" required>

                        <!-- Submit-->
                        <button type="submit"><i class="fas fa-paper-plane"></i> Envoyer</button>

                    </fieldset>
                </form>
