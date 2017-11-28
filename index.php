<?php


/*
** Detail of book
*/
if (isset($_POST['detailBook'])) {
  include("controllers/details/details.php");
}



/*
** Listing of all book
*/
else {
  include("controllers/home/index.php");
}
 ?>
