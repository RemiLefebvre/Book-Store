<?php
require("entities/AdultsBook.php");
require("entities/ChildsBook.php");


/*
 ** Creation Book
 */
 abstract class Book{
   protected $id;
   protected $name;
   protected $cat;
   protected $author;
   protected $resume;
   protected $publication;
   protected $editor;
   protected $score;
   protected $availability;

   public function __construct(array $donnees){
     $this->hydrate($donnees);
     $this->type = strtolower(static::class);
   }

   public function hydrate(array $donnees){
     foreach ($donnees as $key => $value){
       $method = 'set'.ucfirst($key);
       if (method_exists($this, $method)){
         $this->$method($value);
       }
     }
   }


    /**
     * Get the value of Id
    */
    public function id(){return $this->id;}
           /**
     * Set the value of Id
     */
    public function setId(int $id){
        $this->id = $id;
        return $this;
    }

     /**
     * Get the value of Name
    */
    public function name(){return $this->name;}
           /**
     * Set the value of Name
     */
    public function setName(string $name){
      if (strlen($name)<30) {
        $this->name = $name;
        return $this;
      }
    }

    /**
   * Get the value of Cat
  */
    public function cat(){return $this->cat;}
   /**
   * Set the value of Cat
   */
    public function setCat(string $cat){
      if (strlen($cat)<30) {
        $this->cat = $cat;
        return $this;
      }
    }

     /**
     * Get the value of Author
    */
    public function author(){return $this->author;}
     /**
     * Set the value of Author
     */
    public function setAuthor(string $author){
      if (strlen($author)<30) {
        $this->author = $author;
        return $this;
      }
    }

     /**
     * Get the value of Resume
    */
    public function resume(){return $this->resume;}
           /**
     * Set the value of Resume
     */
    public function setResume(string $resume){
        $this->resume = $resume;
        return $this;
    }

     /**
     * Get the value of Publication
    */
    public function publication(){return $this->publication;}
     /**
     * Set the value of Publication
     */
    public function setPublication(int $publication){
      if (strlen($publication)==4) {
        $this->publication = $publication;
        return $this;
      }
    }

     /**
     * Get the value of Editor
    */
    public function editor(){return $this->editor;}
           /**
     * Set the value of Editor
     */
    public function setEditor(string $editor){
      if (strlen($editor)<30){
        $this->editor = $editor;
        return $this;
      }
    }

     /**
     * Get the value of Score
    */
    public function score(){return $this->score;}
     /**
     * Set the value of Score
     */
    public function setScore(int $score){
      if ($score<=5) {
        $this->score = $score;
        return $this;
      }
    }

     /**
     * Get the value of availability
    */
    public function availability(){return $this->availability;}
           /**
     * Set the value of availability
     */
    public function setAvailability(int $availability){
        $this->availability = $availability;
        return $this;
    }
  }
 ?>
