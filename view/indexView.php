<?php include_once("view/template/header.php") ?>




<?php if (isset($message)) {
  echo $message;
} ?>
<main class="mt-5 container card">
  <form class="mb-5 addForm" action="index.php" method="post">
    <h3>Add Book:</h3>
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="author" placeholder="Author">
    <input type="text" name="publication" placeholder="Publication">
    <select class="" name="cat">
      <option value="adultBook">Adult</option>
      <option value="childBook">Child</option>
    </select>
    <input type="text" name="editor" placeholder="Editor">
    <label for="">Score:</label>
    <select class="" name="score">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <br>
    <textarea name="resume" rows="8" cols="80"></textarea>
    <br>
    <input type="submit" name="add" value="Ok">
  </form>

  <hr>
  <hr>

  <div class="mt-4 accounts">
    <div class="d-flex">
      <h5 class="tab"><strong>Name</strong></h5>
      <h5 class="tab"><strong>Author</strong></h5>
      <h5 class="tab"><strong>Publication</strong></h5>
      <h5 class="tab"><strong>Category</strong></h5>
      <h5 class="tab"><strong>Editor</strong></h5>
      <h5 class="tab"><strong>Score</strong></h5>
      <h5 class="tab"><strong>Availability</strong></h5>
      <h5 class="tab"><strong>See more</strong></h5>
    </div>

    <?php
    // var_dump($books);
      foreach ($books as $book) {
        ?>
        <div class="account">
          <div class="d-flex infos">
            <h5 class="tab"><?php echo $book->name() ?></h5>
            <h5 class="tab"><?php echo $book->author() ?></h5>
            <h5 class="tab"><?php echo $book->publication() ?></h5>
            <h5 class="tab"><?php echo $book->cat() ?></h5>
            <h5 class="tab"><?php echo $book->editor() ?></h5>
            <h5 class="tab"><?php echo $book->score() ?></h5>
            <h5 class="tab"><?php echo $book->availability() ?></h5>
            <form class="options" action="index.php" method="post">
              <input type="hidden" name="id" value="<?php echo $book->id()?>">
              <input type="submit " name="detailBook" value="See more">
            </form>
          </div>
        </div>
        <?php
      }
      ?>
  </div>
</main>

<?php include_once("view/template/footer.php") ?>
