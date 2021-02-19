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
	<link rel="stylesheet" href="style/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Commentaire</title>
</head>
<body>
	<section>
		
		<h2>Commenteaire</h2> <br>

		
		<form action="" method="POST">
			<input type="text" name="nom" placeholder="nom" required="" class="form form-control"><br>
			<input type="email" name="email" placeholder="email" required="" class="form form-control"><br> 
			<textarea name="message" placeholder="message" required="" class="form form-control"></textarea><br>
			<input type="submit" name="submit" value="Poster" class="btn btn-primary">
		</form>

		<h3>Commentaires postés</h3>
		
			
           <?php
               require_once('includes/db.php');

               $req=$db->prepare('SELECT *FROM commentaires');
               $req->execute();
               while ($reponse=$req->fetch(PDO::FETCH_OBJ)) {
               	
               
            ?>

            <p>
            	<span>Poster par <td></td><?php echo $reponse->nom ; ?><td></td>le    <?php echo  $reponse->datepost ;?></span>
            	<?php echo $reponse->messages ; ?><br><a href="reponse.php?id=<?php echo $reponse->id;?>">Reponse</a><br><a href="reponses.php?id=<?php echo $reponse->id;?>">Nombre de reponses:

            		<?php 

                         $nbReponse=$db->prepare('SELECT *FROM reponses WHERE id_parent=?');
                         $nbReponse->execute(array($reponse->id));
                          $nbReponse=$nbReponse->fetchAll();

                          echo count($nbReponse) ;

            		?>


            	</a>
            		
            </p>

                <?php
             }  


           ?>

		

		<br><br><br>
	</section>
</body>	
</html>