


<?php
require_once 'inc/functions.php';
session_status();
if(!empty($_POST)){

    $errors = array();
    require_once 'inc/db.php';
    
    if(empty($_POST['username'])|| !preg_match('/^[a-zA-z0-9_]+$/' , $_POST['username'])){

        $errors['username']= "Votre pseudo n'est pas Valide";

    }else{
        
        $req=$pdo->prepare('SELECT id FROM users WHERE username=?');
        $req->execute([$_POST['username']]);
        $user=$req->fetch();
       
       if($user){
       $errors['username']='Ce pseudo est dejà pris';
        }
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        $errors['email']="Votre adresse email n'est pas valide";


    }else{
        
        $req=$pdo->prepare('SELECT id FROM users WHERE email=?');
        $req->execute([$_POST['email']]);
        $user=$req->fetch();
       
       if($user){
       $errors['email']='Cet email est dejà  utiliser pour un autre compte';
        }
    }

    if(empty($_POST['password'])){
        $errors['password']= "Vous devez rentrer un mot de passe valide";
    }

    if(empty($errors)){
       

        $req=$pdo->prepare ("INSERT INTO users SET username = ?, password =?,email =?");
        $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token=str_random(60);
        
        $req->execute([$_POST['username'],  $password, $_POST['email'], $token]);
        $user_id=$pdo->lastInsertId();
        mail($_POST['email'], 'Confirmation de votre compte',"Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/form/confirm.php?id=$user_id&token=$token");
        $_SESSION['flash']['success']='Un email de confirmation vous a été envoyé pour valider votre compte';
        header('location:connexion.php');
        exit();

    }


    
    
    
    
}

?>





<?php if(!empty($errors)):?>

<div class="alert alert-danger">
<p>Vous n'avez pas remplir le formulaire correctement</p>

<ul>

<?php foreach($errors as $error):?>

<li><?= $error; ?></li>

<?php endforeach;?>

</ul>
</div>

<?php endif;?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/inscription.css">
<link rel="stylesheet" href="style/css/bootstrap.min.css">
<title>inscription</title>
</head>
<body>
	<div class="container d-flex justify-content-center">
    <div class="row my-5">
        <div class="col-md-6 text-left text-white lcol">
            <div class="greeting">
                <h3>Bienvenue sur <span class="txt">le Forum</span></h3>
            </div>
            <h6 class="mt-3">Super Forum dédié aux dévéloppeurs ......</h6>
            <div class="footer">
                <div class="socials d-flex flex-row justify-content-between text-white">
                    <div class="d-flex flex-row"><i class="fab fa-linkedin-in"></i><i class="fab fa-facebook-f"></i><i class="fab fa-twitter"></i></div> <span>Politique et confidentialité</span> <span>&copy; 2021 Stoke</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 rcol">
            <form class="sign-up">
                <h2 class="heading mb-4">S'inscrire</h2>
                <div class="form-group fone mt-2"> <i class="fas fa-user"></i> <input type="name" class="form-control" placeholder="Nom" name="username"> </div>
                <div class="form-group fone mt-2"> <i class="fas fa-envelope"></i> <input type="email" class="form-control" placeholder="Adresse email" name="email"> </div>
                <div class="form-group fone mt-2"> <i class="fas fa-lock"></i> <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                    <div class="image"><i class="fas fa-eye"></i></div>
                </div> <input type="checkbox" class="form-check-input ml-0" id="exampleCheck1"> <label class="form-check-label ml-3" for="exampleCheck1">J'accepte les<u>conditions</u> et <u>les politiques de confidentialités</u></label>
            </form> <button type="button" class="btn btn-success mt-5">Envoyer</button>
            <p class="exist mt-4">Utilisateur existant? <span><a href="connexion.php">Se connecter</a></span></p>
        </div>
    </div>
</div>
</div>
</body>
</html>