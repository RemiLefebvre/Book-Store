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


  <!-- LIST OF BOOKS -->
  <h2>List of Books</h2>
  <table class="table-hover table-responsive">
    <thead>
      <tr>
        <th class=""><strong>Name</strong></th>
        <th class=""><strong>Author</strong></th>
        <th class=""><strong>Publication</strong></th>
        <th class=""><strong>Category</strong></th>
        <th class=""><strong>Editor</strong></th>
        <th class=""><strong>Score</strong></th>
        <th class=""><strong>Availability</strong></th>
        <th class=""><strong>See more</strong></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($books as $book) {?>
          <tr>
            <form  action="index.php" method="post">
              <td class=""><?php echo $book->name() ?></td>
              <td class=""><?php echo $book->author() ?></td>
              <td class=""><?php echo $book->publication() ?></td>
              <td class=""><?php echo $book->cat() ?></td>
              <td class=""><?php echo $book->editor() ?></td>
              <td class=""><?php echo $book->score() ?></td>
              <td class="">
                <?php if ($book->availability()==1){ ?>
                  Available
                <?php }else{ ?>
                  Unavaible
                <?php }  ?>
              </td>
              <td class="">
                <input type="submit" name="bookDetails" value="See more">
                <input type="hidden" name="id" value="<?php  echo $book->id()?>">
              </td>
            </form>
          </tr>
          <?php
      } ?>
    </tbody>
  </table>

  <hr>
  <hr>

  <!-- LIST OF USERS -->
  <h2>List of users</h2>
  <table class="table-hover table-responsive">
    <thead>
      <tr>
        <th class=""><strong>User</strong></th>
        <th class=""><strong>Id client</strong></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) {?>
          <tr>
            <form  action="index.php" method="post">
              <td class=""><?php echo $user['name'] ?></td>
              <td class=""><?php echo $user['idClient'] ?></td>
            </form>
          </tr>
          <?php
      } ?>
    </tbody>
  </table>

</main>

<?php include_once("view/template/footer.php") ?>
