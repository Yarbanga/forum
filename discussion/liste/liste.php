<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/bootstrap.min.css">   
    <title>Liste</title>
</head>
<body>
            
<?php  
//on va recuperer tout nos messages
$bdd=new PDO('mysql:host=localhost;dbname=yaya;charset=utf8;', 'root','');
$recupMessages=$bdd->query('SELECT*FROM messages');
while($message=$recupMessages->fetch()){

?> 

<body>
<div class="container-fluid">
    <div class="container gg-center " style="margin-left : 20px;">
      <div class="col-sm-12 mb-10  bg-Secondary ">
        <table>
            <p>
      <?php   
          //require_once('inc/db.php');
          $bdd=new PDO('mysql:host=localhost;dbname=yaya;charset=utf8;', 'root','');
          $recupMessages=$bdd->query('SELECT*FROM messages');          
          while($message=$recupMessages->fetch()){

      ?> 

          <div class="message" style="border: 1px solid black">
          <h1><?= $message['pseudo']; ?> </h1>
          <p><?= $message['message']; ?></p></td> 
          <a href="supprimer.php?id=<?= $message['id']; ?>><button  class="text-white  style=" margin-bottom:10px;" type="submit">Supprimer</button></a>
          <a href="../../commentaire"><button  class="text-white" style=" margin-bottom:10px;" type="submit">Commenter</button></a>
          </div>
          </br>
      <?php 

      }
      ?>               
    </div>
  </div>
</div>
<?php 

}



?>

      
  </div>
  
        </table>
      

</div>    
</body>
</html>

 
  