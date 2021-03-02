<?php 

if(session_status()==PHP_SESSION_NONE){
  session_start();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-widt0
    h, initial-scale=1.0">
    <title>forum</title>
    <link rel="stylesheet" href="style/bootstrap.min.css" >
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/responsive.css">
    <link rel="stylesheet" href="discussion/themes/default/css/style2.css">

    
   
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

                          <div  class="d-flex justify-content-center"><input type="search" id="rech" class="i-espacement2 form-control" placeholder="Recherche..."></div>  
                                
                           <div  class="i-espacement3">
                               <nav class=" i-navclass list-group bg-light" id="list-tab" role="tablist">
                                    
                                     
                                    <a class=" list-group-item list-group-item-action <?php if ($page=="") {
                                        echo 'active';
                                        }  ?>" id="list-home-list"  href="" role="tab" aria-controls="ajouter" class="up-iti-color">Ajouter
                                    </a> 

                                     <a class="list-group-item list-groem-action <?php if ($page=="index") {
                                          echo 'active';
                                          }  ?>" id="list-profile-list"href="contact.php" role="tab" aria-controls="index">Contact
                                    </a>    
                           
                               </nav>
                                       
                            </div>      
                        <div class="i-copyr d-flex justify-content-center"> Copyrigh 2020</div>

                 </aside>

                 <div class="contenu col-lg-10 bg-light border border-light  " id="cont" >
                 <?php 
                 
                switch($page){
                case "index":
                        include("contact.php");
                    break;
                case "list":
                    //echo"<style></style>";
                        include("discussion/liste/liste.php");
                    break;
                default:
                include("discussion/index.php");
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