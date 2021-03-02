<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">  
    <link rel="stylesheet" href="style.css">
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
<fieldset>
  <legend>La liste de  discussions</legend>
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
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
  
        <thead>
            <tr class="col-sm-12 mb-10  bg-Secondary">
                <th><h2>Pseudo</h2></th>
                <th><h2>Messages</h2></th>
                <th><h2>Commentaire</h2></th>
                
            </tr>
        </thead>
        <tbody>
          <tr>
            <div class="message" style="">
                <td class="ml-5"><h1><?= $message['pseudo']; ?> </h1></td>
                <td><p><?= $message['message']; ?></p></td> 
                <td><a href="../../commentaire"><button  class="text-white btn btn-primary" style=" ;"type="submit">Commenter</button></a></td>
            </div>
          </br>
          </tr>
        </tbody>
          
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
</fieldset> 
    </table>
</body>
</html>