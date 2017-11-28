<?php
require("phpmyadmin.php");

/*
**Manager of Books class
*/
class BookManager{
  private $db; // Instance de PDO

  /*
  **DDB
  */
  public function __construct($db){
    $this->setDb($db);
  }
  /*
  **Setter
  */
  public function setDb(PDO $db){
    $this->db = $db;
  }

  /*
  **Add books
  */
  public function add(Book $book){
    // echo $book->name();
    $q = $this->db->prepare('INSERT INTO books(name, author, resume, publication, cat, editor, score, availability ) VALUES(:name, :author, :resume, :publication, :cat, :editor, :score, :availability)');
    $q->execute(array(
      'name'=>$book->name(),
      'author'=>$book->author(),
      'resume'=>$book->resume(),
      'publication'=>$book->publication(),
      'cat'=>$book->cat(),
      'editor'=>$book->editor(),
      'score'=>$book->score(),
      'availability'=>$book->availability()
    ));

    return true;
  }

  /*
  **Get book
  */
  public function getBook($info){
      $q = $this->db->query('SELECT name, author, resume, publication, cat, editor, score, availability FROM books WHERE id ='.$info);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);

      $book = new $donnees['cat'](['name'=>$donnees['name'], 'author'=>$donnees['author'], 'resume'=>$donnees['resume'], 'publication'=>$donnees['publication'], 'cat'=>$donnees['cat'], 'editor'=>$donnees['editor'], 'score'=>$donnees['score'], 'availability'=>$donnees['availability']]);

      return $book;
    }

    /*
    **Get bookList
    */
    public function getBookList($select){
      $bookList = [];
      $q = $this->db->prepare('SELECT * FROM books WHERE cat=:cat ORDER BY id DESC');
      $q->execute(array(
        'cat'=>$select
      ));

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
        $bookList[] = new $donnees['cat'](['name'=>$donnees['name'], 'author'=>$donnees['author'], 'resume'=>$donnees['resume'], 'publication'=>$donnees['publication'], 'cat'=>$donnees['cat'], 'editor'=>$donnees['editor'], 'score'=>$donnees['score'], 'availability'=>$donnees['availability']]);
      }
      return $bookList;
    }


    /*
    **Get userList
    */
    public function getUserList(){
      $userList = [];
      $q = $this->db->query('SELECT * FROM users ORDER BY id DESC');

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
        $userList[] = new $donnees['cat'](['name'=>$donnees['name'], 'author'=>$donnees['author'], 'resume'=>$donnees['resume'], 'publication'=>$donnees['publication'], 'cat'=>$donnees['cat'], 'editor'=>$donnees['editor'], 'score'=>$donnees['score'], 'availability'=>$donnees['availability']]);
      }
      return $userList;
    }

    /*
    **change availability
    */
    public function changeAvailability(Book $book){
      $q = $this->_db->prepare('UPDATE books SET availability = :availability WHERE id = :id');
      $q->execute(array(
        'id'=>$vehicule->id(),
        'availability'=>$vehicule->availability()
      ));

      return true;
    }

    /*
    **Count of books
    */
    public function count(){
      $q = $this->db->query('SELECT COUNT(*) FROM books')->fetchColumn();
      return $q;
    }

  /*
  **Get bookList
  */
  // public function getBookList($info){
  //   $listBook = [];
  //   $q = $this->db->query('SELECT * FROM books LEFT JOIN users ON books.id=users.idVehicle ORDER BY books.id DESC');
  //
  //   while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
  //     $listBook[] = createBook(["id" => $donnees['idVehicle'],"name" => $donnees['name'],"model" => $donnees['model'],"detail" => $donnees['detail'],"type" => $donnees['type'],"sourceImg" => $donnees['sourceImg']]);
  //   }
  //   return $listBook;
  // }

} ?>
