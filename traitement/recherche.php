<?php include("connexion.php");
if(isset($_GET['search']))
{
  $sql = 'SELECT * FROM messages WHERE pseudo LIKE :search OR pseudo LIKE :search OR  message LIKE :search';
$select_recherche=$bdd->prepare($sql);
$test=$select_recherche->execute(array("search"=>'%'.$_POST['search'].'%'));

while($don=$select_recherche->fetch()) {
  $gettuteur=$bdd->prepare("SELECT * FROM pseudo WHERE message=?");
  
 ?>   
<div class="row">
<div class="col-md-12 d-flex flex-row card">

  <div class="card-body col-md-7">
    <h5 class="card-title">pseudo:<?php echo $don['id']; ?></h5> <hr>
    <h5 class="card-title">message:<?php echo $don['message']; ?></h5> <hr>
    

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     
    </div>
  </div>
</div>
<div>
</div>
</div>
</div>
</div>
<?php
}
}
?>