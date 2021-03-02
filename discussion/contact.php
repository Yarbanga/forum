<?php 

    if(isset($_POST['submit'])){
        extract($_POST);

        if (!empty($nom) and !empty($email) and !empty($message) ) {
            require_once('includes/db.php');

            $req=$db->prepare('INSERT INTO commentaires(nom,email,messages,datepost) VALUES (?,?,?,NOW())');
            $req->execute(array($nom,$email,$message));

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style/style2.css">
	<link rel="stylesheet" href="style/css/bootstrap.min.css">
	<title>Formulaire de contact</title>
</head>
<body>
    
      <div class="container d-flex justify-content-center">
        <div class="row my-2 mx-2">
        <div class="col-md-6"> <img src="https://png.pngtree.com/png-vector/20190725/ourlarge/pngtree-message-icon-design-vector-png-image_1587713.jpg" alt="IMG"> </div>
        <!--col-->
        <div class="col-md-6">
            <h2 class="form-title">Nous contacter</h2>
            <p class="justify text-muted">Avez-vous besoins d'un guide dev?<br>Veuillez bien nous contacter.</p>
            <form>
                <div class="form-group pt-2 pl-1"> <label for="exampleInputName">Nom</label> <input type="text" class="form-control" id="exampleInputName" name="nom"> </div>
                <div class="form-group pl-1"> <label for="exampleInputEmail1">Adresse Email</label> <input type="email" class="form-control" id="exampleInputEmail1" name="email"> </div>
                <div class="form-group pl-1"> <label for="exampleFormControlTextarea1">Message</label> <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="message"></textarea> </div>
                <div class="row">
                    <div class="col-md-3 offset-md-9"><button type="submit" class="btn btn-primary" name="submit">Envoyer</button></div>
                </div>
            </form>	
</body>
</html>