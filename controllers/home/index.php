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
      $id=htmlspecialchars($_POST['id']);
      $availability=htmlspecialchars($_POST['availability']);

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
**Add book
*/
if (isset($_POST['add'])) {
  /*verification if there are all require's infos*/
  if (isset($_POST['name']) && isset($_POST['author']) && isset($_POST['resume']) && isset($_POST['publication']) && isset($_POST['cat']) && isset($_POST['editor']) && isset($_POST['score'])) {

    /*verification if all input are full*/
    if (!empty($_POST['name']) && !empty($_POST['author']) && !empty($_POST['resume']) && !empty($_POST['publication']) && !empty($_POST['cat']) && !empty($_POST['editor']) && !empty($_POST['score'])) {

      /*verification if format date is correct*/
      if (preg_match("#^[0-9]{4}$#",$_POST['publication'])) {

        /*protect XSS failling*/
        $name=htmlspecialchars($_POST['name']);
        $cat=htmlspecialchars($_POST['cat']);
        $editor=htmlspecialchars($_POST['editor']);
        $author=htmlspecialchars($_POST['author']);
        $resume=htmlspecialchars($_POST['resume']);
        $publication=intval(htmlspecialchars($_POST['publication']));
        $score=intval(htmlspecialchars($_POST['score']));

        $addVehicule= new $cat(['name'=>$name, 'author'=>$author, 'resume'=>$resume, 'publication'=>$publication, 'cat'=>$cat, 'editor'=>$editor, 'score'=>$score]);

        // add on DDB
        $manager->add($addVehicule);
        }
        else {
          $message="Date false (Exemple:1999)";
        }
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
**Get books list
**If filtring
*/
if (isset($_POST['select'])) {
  /*protect XSS failling*/
  $select=htmlspecialchars($_POST['select']);
}
/*if no select detected: default->name*/
else {
  $select=NULL;
}
/*get list */
$books= $manager->getBookList($select);


/*
**Get users list
*/
$users= $manager->getUserList();






require("view/indexView.php");

 ?>
