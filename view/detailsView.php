<?php include_once("view/template/header.php") ?>
<?php if (isset($message)) {
  echo $message;
} ?>


<main class="mt-5 container card">

  <!-- FORM ADD -->
  <form class="mb-5 addForm" action="index.php" method="post">
    <h3>Add Book:</h3>
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="author" placeholder="Author">
    <input type="text" name="publication" placeholder="Publication">
    <select class="" name="cat">
      <option value="adultsBook">Adult</option>
      <option value="childsBook">Child</option>
    </select>
    <input type="text" name="editor" placeholder="Editor"><br>
    <label for="">Score:</label>
    <select class="" name="score">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <br>
    <textarea name="resume" rows="8" cols="80" placeholder="Resume"></textarea>
    <br>
    <input type="submit" name="add" value="Ok">
  </form>

  <hr>
  <hr>

  <h2>Title: <strong><?php echo $book->name() ?></strong></h2>
  <span class="availability">
  <?php if ($book->availability()==1) {?>
      Available
  <?php  }else{?>
    unavailable (took by : <?php echo $book->availability() ?>)
    <?php } ?>
  </span><br>

  <hr>

  <span><strong>Author:</strong> <?php echo $book->author() ?></span>
  <span><strong>Publication:</strong> <?php echo $book->publication() ?></span>
  <span><strong>Editor:</strong> <?php echo $book->editor() ?></span>
  <span><strong>Category:</strong> <?php echo $book->cat() ?></span>
  <span><strong>Score:</strong> <?php echo $book->score() ?></span>
  <p><strong>Resume:</strong> <?php echo $book->resume() ?></p>

  <hr>




  <!-- FORM TAKE/RETURN -->
  <?php if ($book->availability()==1){ ?>
    <form class="" action="index.php" method="post">
      <input type="hidden" name="bookDetails" value="">
      <input type="hidden" name="id" value="<?php echo $book->id() ?>">
      <label for="">Take this book by:</label>
      <select name="availability">
        <?php foreach ($users as $user): ?>
          <option value="<?php echo $user['idClient'] ?>"><?php echo $user['name'] ?> (id client:<?php echo $user['idClient'] ?>)</option>
        <?php endforeach; ?>
      </select>
      <input type="submit" name="changeAvailability" value="ok">
    </form>
  <?php }else{?>
    <form class="" action="index.php" method="post">
      <input type="hidden" name="bookDetails" value="">
      <input type="hidden" name="id" value="<?php echo $book->id() ?>">
      <input type="hidden" name="availability" value="1">
      <label for="">Tooken by: <?php echo $book->availability() ?></label><br>
      <label for="">Get back this book:</label>
      <input type="submit" name="changeAvailability" value="ok">
    </form>
  <?php } ?>


</main>

<?php include_once("view/template/footer.php") ?>
