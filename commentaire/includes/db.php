<?php 

try{

  $db = new PDO ('mysql:host=localhost;dbname=yaya;charset=utf8','root','');
  $db->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //$db->setattribute(PDO::ATTR_CASE,PDO::ERRMODE_CASE_LOWER);
  return $db;

}catch(PDOException $e){
  echo 'erreur de connexion a la base de donnée' .$e->getMessages();
}


?>