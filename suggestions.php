<?php include 'inc/header.php'; ?>

<?php
$sql = 'SELECT * FROM suggestions';
$result = mysqli_query($connect, $sql);
$suggestions = mysqli_fetch_all($result, MYSQLI_ASSOC);
//connects to mysqli to retrieve associative database.
?>

<h2>Suggestions</h2>
Items will be updated as I work on them; or removed if I reject them.
<?php if (empty($suggestions)) : ?>
  <p class="lead mt3">There's nothing here yet!
  <?php endif; ?>
  <?php foreach ($suggestions as $suggestion) : ?>
    <?php $sqltime = strtotime($suggestion['date']); ?>
  <div class="card my-3 w-75">
    <div class="card-body text-center">
      <?php echo $suggestion['body']; ?>
      <div class="text-secondaty mt-2">
        Suggested By: <?php echo $suggestion['nickname']; ?> on <?php echo "  " . date("m/d/y g:i A", $sqltime); ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  </div>


<?php include 'inc/footer.php'; ?>