<?php
require("model/BookManager.php");

/*
**Create Véhicule manager
*/
$manager = new BookManager($db);



/*
**Change Availability
*/
/*verification if there are all require's infos*/
if (isset($_POST['changeAvailability'])){
  if (isset($_POST['id']) && isset($_POST['availability'])) {
    /*verification if all input are full*/
    if ( !empty($_POST['id']) && !empty($_POST['availability'])) {
      // secure XSS
      $id=intval(htmlspecialchars($_POST['id']));
      $availability=intval(htmlspecialchars($_POST['availability']));

      // get book in DDB
      $bookChangingAvailability=$manager->getBook($id);

      // Change his availability
      $bookChangingAvailability->setAvailability($availability);

      // put in DDB (chang in DDB)
      $manager->changeAvailability($bookChangingAvailability);
    }
    else {
      $message="Input empty";
    }
  }
  else {
    $message="Input empty";
  }
}




/*
**get book's details
*/
/*verification if there are all require's infos*/
if (isset($_POST['id'])) {

  /*verification if all input are full*/
  if (!empty($_POST['id'])) {
    /*protect XSS failling*/
    $id=htmlspecialchars($_POST['id']);

    // get on DDB
    $book=$manager->getBook($id);
  }
  else {
    header("Location:controllers/home/index.php");
  }
}


/*
**Get users list
*/
$users= $manager->getUserList();


require("view/detailsView.php");

 ?>
