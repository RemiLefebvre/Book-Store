<?php include_once("view/template/header.php") ?>
<?php if (isset($message)) {
  echo $message;
} ?>


<!-- <select class="" name="idAddMoneyAccount">
  <option value="">--</option>
  <?php for ($i=0; $i < count($listIdAccounts); $i++) {
    ?>
    <option value="<?php echo $listIdAccounts[$i] ?>"><?php echo $listIdAccounts[$i] ?></option>
    <?php
  } ?>
</select> -->


<?php include_once("view/template/footer.php") ?>
