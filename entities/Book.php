<?php


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

   public function construct(array $donnees){
     $this->hydrate($donnees);
     $this->type = strtolower(static::class);
   }

   public function hydrate(array $donnees){
     foreach ($donnees as $key => $value){
       $method = 'set'.ucfirst($key);
       if (methodexists($this, $method)){
         $this->$method($value);
       }
     }
   }


    /**
     * Get the value of Id
    */
    public function getId(){return $this->id;}
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
    public function getName(){return $this->name;}
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
    public function getCat(){return $this->cat;}

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
    public function getAuthor(){return $this->author;}
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
    public function getResume(){return $this->resume;}
           /**
     * Set the value of Resume
     */
    public function setResume(string $resume){
        $this->resume = $resume;
        return $this;
    }
           /**
     * Get the value of Date
    */
    public function getDate(){return $this->publication;}
           /**
     * Set the value of Date
     */
    public function setDate($publication){
        $this->publication = $publication;
        return $this;
    }
           /**
     * Get the value of Editor
    */
    public function getEditor(){return $this->editor;}
           /**
     * Set the value of Editor
     */
    public function setEditor($editor){
      if (strlen($editor)<30) {
        $this->editor = $editor;
        return $this;
      }
    }
           /**
     * Get the value of Score
    */
    public function getScore(){return $this->score;}
           /**
     * Set the value of Score
     */
    public function setScore(int $score){
      if ($scrore<=5) {
        $this->score = $score;
        return $this;
      }
    }
           /**
     * Get the value of Avaibality
    */
    public function getAvaibality(){return $this->avaibality;}
           /**
     * Set the value of Avaibality
     */
    public function setAvaibality(int $availability){
        $this->avaibality = $availability;
        return $this;
    }
  }
 ?>
