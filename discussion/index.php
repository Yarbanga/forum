<?php  

$bdd=new PDO('mysql:host=localhost;dbname=yaya;charset=utf8;', 'root','');

if(isset($_POST['valider'])){
  if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){
      $pseudo=htmlspecialchars($_POST['pseudo']);
     
      $message=nl2br (htmlspecialchars($_POST['message']));

     
     $insererMessage = $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES (? ,?)');
     $insererMessage->execute(array($pseudo, $message));
     header("location:discussion/liste/liste.php");
  }else{
    echo " Veuillez completer tous les champs........?";
  }

}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="themes/default/css/bootstrap.min.css">
    <link rel="stylesheet" href="themes/default/css/style2.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>forum</title>
</head>
<body>

  <div id="Category_1" class="row forumModule forumMargin">
    <a href="#" onclick="showDiscussions( 1)";>
        <div class="col-lg-12 columpad">
          <div class="pullLeft">
             <h1>Dev Forum</h1>
          </div>

              
            <div class="col-lg-12" style="margin-top: 5px;">

        <div class="pullRight">
            <a class="btn btn-primary themeButton" href="#" onclick="startDiscussion(1);">Start Discussion</a>
        </div>

      </div>
      </div>
    </a>
  </div>


<div id="cat_new_discussion_1" class="row ">
  <div class="col-lg-12">
      <form method="POST" action="">
        <div class="form-group">
          Title
          <input type="text" name="pseudo" class="form-control" size="40"> </input>
           
           <br>
          content
          <textarea class="newDiscussionText mt-2 form-control" style="width: 100%" name="message" rows="10"  rows="10">Text</textarea>
        </div>
        <button class="btn btn-secondary themeButton" type="sbmit" name="valider" style="margin-left:93%;">Valider</button>
        
      </form>
      <section id="messages">
      



<script src="themes/default/js/forum_home.js" type="text/javascript"></script>
<script src="style/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</html>