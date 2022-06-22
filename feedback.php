<?php include './include_files/header.php' ?>
<?php 
  $sql = 'SELECT * FROM feedback';
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
   
    <h2>Client Feedback</h2>

    <?php if (empty($feedback)): ?>
      <p class="lead mt3">No Feedbacks :(</p>
    <?php endif; ?>

    <?php foreach($feedback as $item): ?>

      <div class="card my-3 w-70">
      <div class="card-body text-center">
        <?php echo $item['body']; ?>
        <div class="text-secondary mt-2">
          By <?php echo $item['name'] ?> On <?php echo $item['date']; ?>
        </div>
      </div>
    </div>

   <?php endforeach; ?>  
  
<?php include './include_files/footer.php' ?>