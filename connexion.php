<?php 

session_start();
if(isset($_POST['valider'])){
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        $email_par_defaut="yayayarbanga@gmail.com";
        $password_par_defaut="yaya2217";
        
    $email_saisi=htmlspecialchars($_POST['email']);
    $password_saisi=htmlspecialchars($_POST['password']);
    
    if($email_saisi==$email_par_defaut AND $password_saisi==$password_par_defaut){
        $_SESSION['password']=$password_saisi;
        header('Location:index.php');
    
    }else{
        echo "Votre mot de passe ou pseudo est incorrect";
    }
        
    }else{
        echo "Veuillez completer tous les champs...";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/connexion.css">
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <title>Connexion</title>
</head>
<body>
    <div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-6 d-none d-md-flex bg-image"></div>
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-xl-6 mx-auto">
                            <h3 class="display-4">LOGIN!!</h3> <br>
                            <form action="" method="POST">
                                <div class="form-group mb-3"> <input id="inputEmail" type="email" name="email" placeholder="Adresse Email " autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4"> </div>
                                <div class="form-group mb-3"> <input id="inputPassword" type="password" name="password" placeholder="Mot de Passe" class="form-control rounded-pill border-0 shadow-sm px-4 text-danger"><br> </div>
                                <div class="custom-control custom-checkbox mb-3"> <input id="customCheck1" type="checkbox" checked class="custom-control-input" name="valider"> </div> <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm" name="valider">Valider</button>
                                <div class="text-center d-flex justify-content-between mt-4">
                                <p> OU &nbsp<a href="inscription.php " class="font-italic text-muted"> <u>Creer un compte</u></a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>