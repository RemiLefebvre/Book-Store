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
        $author=htmlspecialchars($_POST['author']);
        $resume=htmlspecialchars($_POST['resume']);
        $publication=intval(htmlspecialchars($_POST['publication']));
        $cat=intval(htmlspecialchars($_POST['cat']));
        $editor=intval(htmlspecialchars($_POST['editor']));
        $score=intval(htmlspecialchars($_POST['score']));

        $addVehicule= new $type(['name'=>$donnees['name'], 'author'=>$donnees['author'], 'resume'=>$donnees['resume'], 'publication'=>$donnees['publication'], 'cat'=>$donnees['cat'], 'editor'=>$donnees['editor'], 'score'=>$donnees['score'], 'availability'=>$donnees['availability']]);

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
**Delete vehicule
*/
if (isset($_POST['supp']) && isset($_POST['id'])) {
  $suppVehicule=intval(htmlspecialchars($_POST['id']));
  $manager->delete($suppVehicule);
}

/*
**Get Véhicule list
**If filtring
*/
if (isset($_POST['filtre'])) {
  /*protect XSS failling*/
  $filtre=htmlspecialchars($_POST['filtre']);
}
/*if no filtre detected: default->name*/
else {
  $filtre='name';
}
/*get list */
$vehicules= $manager->getList($filtre);


/*
**Get Véhicule list
**If filtring
*/
$firstVehicules= $manager->getFirstVehicle();






require("view/listingView.php");

 ?>
