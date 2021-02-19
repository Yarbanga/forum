<?php  

$bdd=new PDO('mysql:host=localhost;dbname=yaya;charset=utf8;', 'root','');

if(isset($_POST['valider'])){
  if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){
      $pseudo=htmlspecialchars($_POST['pseudo']);
     
      $message=nl2br (htmlspecialchars($_POST['message']));

     
     $insererMessage = $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES (? ,?)');
     $insererMessage->execute(array($pseudo, $message));
     header("location:liste/liste.php");
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
<div class="headerfixedar">
   <div class="row headerfixedContent">
      <div class="col-lg-12">
          <div class=" pullLeft" style="margin-top: 5px;">
              <a class="headerlogotext" href="index.php"title="Forum.com"><img class="headerlogoImage" src="themes/default/images/logo.png"> Forum</a>
          </div>
          <div class="pullRight">
              <a class="btn btn-primary themeButton" href="index.php?lagout"title="Forum.com">Lagout</a>
          </div>
      </div>         
    </div>
</div>

<body>
<!--debut de mon forum-->
<div class="container ">
  <div class="row">
    <div class="col-lg-12 peginationBar forumModule forumMargin">
      <a href="#">Home</a> <!--<i class="fa fa-chevron-circle-right peginationArrow"><a href="#">Category</a><i class="fa fa-chevron-circle-right peginationArrow"><a href="#">Discussion</a></i>-->
    </div>
  </div>     


  <div id="Category_1" class="row forumModule forumMargin">
    <a href="#" onclick="showDiscussions( 1)";>
        <div class="col-lg-12 columpad">
          <div class="pullLeft">
             <h1>Catecory Name </h1>
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