    <?php include 'inc/header.php'; ?>


    <?php

    //Setting Default Values to Nothing
    $name = $discord = $body = '';
    $nameError = $discordError = $bodyError = '';
    $discordRegex = "/^.{3,32}[0-9]{4}$/";

    //Form Submitting
    if (isset($_POST['submit'])) {
      //Validate the name
      if (empty($_POST['name'])) {
        $nameError = 'Nickname is required';
      } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }
      //Validate the discord tag

      if (empty($_POST['discord'])) {
        $discordError = 'Discord ID is required';
      } elseif (!preg_match($discordRegex, $_POST['discord'])) {
        $discordError = 'Discord ID improperly formatted.';
      } else {
        $discord = filter_input(INPUT_POST, 'discord', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }
      //Validate the ID
      if (empty($_POST['body'])) {
        $bodyError = 'You need to write a suggestion!';
      } else {
        $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      }
      if(empty($nameError) && empty($bodyError) && empty($bodyError)){
        $sql = "INSERT INTO suggestions (nickname,discord,body) VALUES ('$name', '$discord','$body')";
  
        if(mysqli_query($connect, $sql)){
          //success
          echo 'Thank you for your submission!';
        }
      }
    }

    

    ?>

    <img src="https://ih1.redbubble.net/image.1747987534.8182/flat,750x,075,f-pad,750x1000,f8f8f8.jpg" class="w-25 mb-3" alt="">
    <h2>Suggestion Box</h2>
    <p class="lead text-center">What does your server need?</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Nickname</label>
        <input type="text" class="form-control <?php echo !$nameError ?: 'is-invalid'; ?>" id="name" name="name" placeholder="Enter your nickname">
        <div class="invalid-feedback">
          <?php echo $nameError ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="discord" class="form-label">Discord Username (ex. johndoe#9999) </label>
        <input type="text" class="form-control <?php echo !$discordError ?: 'is-invalid'; ?>" id="discord" name="discord" placeholder="Enter your discord username">
        <div class="invalid-feedback">
          <?php echo $discordError ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Suggestion</label>
        <textarea class="form-control <?php echo !$bodyError ?: 'is-invalid'; ?>" id="body" name="body" placeholder="Enter your suggestion(s)"></textarea>
        <div class="invalid-feedback">
          <?php echo $bodyError ?>
        </div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
    <?php include 'inc/footer.php'; ?>