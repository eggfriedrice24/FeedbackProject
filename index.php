<?php include './include_files/header.php' ?>

<?php 
  $name = $body = $email = '';
  $name_error = $email_error = $body_error = '';

  // form submit
  if (isset($_POST['submit'])) {
    // validate form
    if (empty($_POST['name'])) {
      $name_error = 'Name is required!';
    } else {
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
  }

  
    // validate form
    if (empty($_POST['email'])) {
      $email_error = 'Email is required!';
    } else {
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
  

  
    // validate form
    if (empty($_POST['body'])) {
      $body_error = 'Feedback is required!';
    } else {
      $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
  

  if (empty($name_error) && empty($email_error) && empty($body_error)) {
    // submit to database
    $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";

    if (mysqli_query($conn, $sql)) {
      // succesfull
      header('Location: ./feedback.php');
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }

?>

    <img src="./img/logo.jpg" class="w-25 mb-3" alt="">
    <h2>Feedback</h2>
    <p class="lead text-center">let us know what you think...</p>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo empty($_POST['name']) ? 'is-invalid' : null; ?> " id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback"><?php echo $name_error ?></div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo empty($_POST['email']) ? 'is-invalid' : null; ?>" id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback"><?php echo $email_error ?></div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo empty($_POST['body']) ? 'is-invalid' : null; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
        <div class="invalid-feedback"><?php echo $body_error ?></div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>


<?php include './include_files/footer.php' ?>    