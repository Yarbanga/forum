<?php 

///session_start();
//if($_SESSION['mdp']){
//	header('Location:connection.php');
//}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forum</title>
    <link rel="stylesheet" href="style/bootstrap.min.css" >
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/responsive.css">
   
</head>
<?php 
if(isset($_GET["page"])){
    $page=$_GET["page"];
}else{
   $page="";
}
?>
<body   bg-dark>
    <div class="i-conteneur container-fluid"  >   
            
         <div  class=" bg-dark bar"> <button id="btopen" class="" >&#9776;</button><h1 class="tr_list">forum</h1></div>
                 
            <div class="row sou-content">
           
                <aside class=" col-lg-2 bg-dark border border-light aside  i-taille i-espacement1 ">
                <div  class=" bg-light"> <img class="img-fluid" src="imgsite/images.png" alt=""></div>

                          <div  class="d-flex justify-content-center"><input type="search" id="rech" class="i-espacement2 form-control" placeholder="       Recherche..."></div>  
                                <a class=" list-group-item list-group-item-action <?php if ($page=="discussion/index.php") {
                                    echo 'active';
                                    }  ?>" id="list-home-list"  href="discussion/index.php" role="tab" aria-controls="ajouter" class="i-color">Discussion
                                 </a> 
                          

                           <div  class="i-espacement3">
                               <nav class=" i-navclass list-group bg-light" id="list-tab" role="tablist">
                                    
                                     
                                    <a class=" list-group-item list-group-item-action <?php if ($page=="") {
                                        echo 'active';
                                        }  ?>" id="list-home-list"  href="" role="tab" aria-controls="ajouter" class="i-color">Ajouter
                                    </a> 

                                     <a class="list-group-item list-group-item-action <?php if ($page=="list") {
                                          echo 'active';
                                          }  ?>" id="list-profile-list"   href="" role="tab" aria-controls="#">Supprimer
                                    </a>    
                                    
                                    
                           
                               </nav>
                                       
                            </div>
                 
       
                        <div class="i-copyr d-flex justify-content-center"> Copyrigh 2020</div>

                 </aside>      
               
                 <div class="contenu col-lg-10 bg-light border border-light  " id="cont" >
                 <?php 
                 
                switch($page){
                case "enregistrement":
                        include("includes/enregistrement.php");
                    break;
                case "list":
                    echo"<style>.imp{display:inline;}</style>";
                        include("includes/list.php");
                    break;
                default:
                //include("includes/liste.php");
                break;
            }
        
        ?>
                        
        </div>             
    </div>            
</div>
</body>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Jsearch.js"></script>
<script src="js/script.js"></script>
</html>            