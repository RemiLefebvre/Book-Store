<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=exoPOO', 'root', 'gesundheititit');
}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
 ?>
