<?php  

require_once('includes/db.php');
	if(isset($_POST['submit'])){
		extract($_POST);

		if (!empty($nom) and !empty($email) and !empty($message) ) {
			

			$req=$db->prepare('INSERT INTO reponses(id_parent,nom,email,messages,datepost) VALUES (?,?,?,?,NOW())');
			$req->execute(array($_GET['id'],$nom,$email,$message));

		}
	}



?>  

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Commentaires</title>
	<link rel="stylesheet" href="style/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

    <section>
		

		<!--Recuperation du commentaire-->

        <?php
               require_once('includes/db.php');

               $req=$db->prepare('SELECT *FROM commentaires WHERE id=?');
               $req->execute(array($_GET['id']));
               while ($reponse=$req->fetch(PDO::FETCH_OBJ)) {
               	
               
            ?>

            <p>
            	<span>Poster par <td></td> <?php echo $reponse->nom ; ?><td></td> le    <?php echo  $reponse->datepost ;?></span>
            	<?php echo $reponse->messages ; ?><br>
            		
            </p>

                <?php
             }  


           ?>


		<form action="" method="POST">
			
			<h2>Repondre</h2>
			<input type="text" name="nom" placeholder="nom" required="" class="form form-control"><br>
			<input type="email" name="email" placeholder="email" required="" class="form form-control"><br> 
			<textarea name="message" placeholder="message" required="" class="form form-control"></textarea><br>
			<input type="submit" name="submit" value="Poster" class="btn btn-primary">
		</form>
		<h2>Reponses</h2> <br>

           <?php
               require_once('includes/db.php');

               $req=$db->prepare('SELECT *FROM reponses WHERE id_parent=?');
               $req->execute(array($_GET['id']));
               while ($reponse=$req->fetch(PDO::FETCH_OBJ)) {
               	
               
            ?>

            <p>
            	<span>Poster par <td></td><?php echo $reponse->nom ; ?><td></td>le    <?php echo  $reponse->datepost ;?></span>
            	<?php echo $reponse->messages ; ?><br>
            		
            </p>

                <?php
             }  


           ?>
	</section>
</body>
</html>



