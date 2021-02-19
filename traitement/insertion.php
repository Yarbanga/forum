<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forum</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css" >
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<?php
function reponse($rep){
?>

<div class="carte">
<div class="col-md-12 d-flex flex-row card">
<div class="card-body im-d col-md-5">
  <p>
  <?php echo $rep;?>
  </p>
<div>
<a href="../index.php" type="button" class="btn btn-primary tuteurbt" >Retourner a l'accueil...</a>
</div>
</div>
</div>
</div>
<?php
}
require("connexion.php");
//on verifie si les donnees ont ete envoyer
if(isset($_POST["nom_a"]) AND isset($_POST["prenom_a"]) AND isset($_POST["date_a"])
AND isset($_POST["ville_a"]) AND isset($_POST["etablissement_a"]) AND isset($_POST["contact_a"])
AND isset($_POST["nom_t"]) AND isset($_POST["Prenom_t"]) AND isset($_POST["contact_t"]) 
AND isset($_POST["domicile-t"]) AND isset($_FILES["photo"])){
    //ont verifie si le tuteur existe deja
    $verif=$bdd->prepare('SELECT telephone FROM tuteur WHERE telephone=:tel');
    $verif->execute(["tel"=>$_POST["contact_t"]]);
    $tuteur=$verif->fetchAll();
    if(count($tuteur)==0){
        $tel=$_POST["contact_t"];
       
        ]);
    }

    //ont verifie si l'apprenant existe deja
    $verif_a=$bdd->prepare('SELECT contact FROM apprenant WHERE contact=:tel');
    $verif_a->execute(["tel"=>$_POST["contact_a"]]);
    $apprenant=$verif_a->fetchAll();
    if(count($apprenant)==0){
       
        //ont insert l'apprenant dans la base de donne
    $inser_a=$bdd->prepare('INSERT INTO apprenant(tel_tuteur,nom, prenom, date_de_naissance, ville_origine, etablissement, contact, photo) VALUES ( :tel_tuteur,:nom, :prenom, :date_de_naissance, :ville_origine, :etablissement, :contact, :photo)');
    $insconf=$inser_a->execute([ 
    "tel_tuteur"=>htmlspecialchars($_POST['contact_t']), 
    "nom"=>htmlspecialchars($_POST['nom_a']), 
    "prenom"=>htmlspecialchars($_POST['prenom_a']), 
    "date_de_naissance"=>htmlspecialchars($_POST['date_a']), 
    "ville_origine"=>htmlspecialchars($_POST['ville_a']), 
    "etablissement"=>htmlspecialchars($_POST['etablissement_a']), 
    "contact"=>htmlspecialchars($_POST['contact_a']), 
    "photo"=>"images/".htmlspecialchars($_POST['contact_a'])."photo.JPG"
    //"genre"=>htmlspecialchars($_POST[''])
    ]);
    //on verifi si les donnes ont etes inserer et ont stock l'image
    if($insconf){
    $chemain="../images/".htmlspecialchars($_POST['contact_a'])."photo.JPG";
    move_uploaded_file($_FILES['photo']['tmp_name'],$chemain);
        
             reponse("l'apprenant ".$_POST['nom_a']." ".$_POST['prenom_a']. " a été enregistré avec succès..!");       
    }
}else{
       reponse("l'apprenant ".$_POST['nom_a']." ".$_POST['prenom_a']. " existe déjà..!");
}
}
?>
</body>
</html>