<?php
require("model/BookManager.php");


/*
**get book's details
*/
/*verification if there are all require's infos*/
if (isset($_POST['id'])) {

  /*verification if all input are full*/
  if (!empty($_POST['id'])) {
    /*protect XSS failling*/
    $name=htmlspecialchars($_POST['name']);

    // get on DDB
    $book=$manager->add($addVehicule);
  }
  else {
    header("Location:controllers/home/index.php");
  }
}


/*
**Get users list
*/
$users= $manager->getUserList();


require("view/indexView.php");

 ?>
