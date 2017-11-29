<?php
require("phpmyadmin.php");
require("entities/Book.php");


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
    $q = $this->db->prepare('INSERT INTO books(name, author, resume, publication, cat, editor, score) VALUES(:name, :author, :resume, :publication, :cat, :editor, :score)');
    $q->execute(array(
      'name'=>$book->name(),
      'author'=>$book->author(),
      'resume'=>$book->resume(),
      'publication'=>$book->publication(),
      'cat'=>$book->cat(),
      'editor'=>$book->editor(),
      'score'=>$book->score()
    ));

    return true;
  }

  /*
  **Get bookdetail
  */
  public function getBookDetails($info){
    $q = $this->db->query('SELECT id ,name, author, resume, publication, cat, editor, score, availability FROM books WHERE id ='.$info);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    $book = new $donnees['cat']($donnees);

    return $book;
  }

  /*
  **Get book
  */
  public function getBook($info){
    $q = $this->db->query('SELECT * FROM books WHERE id ='.$info);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    $book = new $donnees['cat']($donnees);

    return $book;
  }


    /*
    **Get bookList
    */
    public function getBookList($select){
      $bookList = [];
      if ($select==NULL) {
        $q = $this->db->query('SELECT * FROM books ORDER BY id DESC');
      }
      else {
        $q = $this->db->prepare('SELECT * FROM books WHERE cat=:cat ORDER BY id DESC');
        $q->execute(array(
          'cat'=>$select
        ));
      }
      while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
          $bookList[] = new $donnees['cat']($donnees);
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
        $userList[] = $donnees;
      }
      return $userList;
    }

    /*
    **change availability
    */
    public function changeAvailability(Book $book){
      $q = $this->db->prepare('UPDATE books SET availability = :availability WHERE id = :id');
      $q->execute(array(
        'id'=>$book->id(),
        'availability'=>$book->availability()
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

} ?>
