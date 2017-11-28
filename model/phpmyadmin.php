<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=bookstore', 'root', 'gesundheititit');
}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
 ?>
