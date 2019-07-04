<div class="row margin-50">
  <?php foreach ($articles as $article): ?>
    <div class="col-7">
        <h1>
            <?php echo $article['title']?>
        </h1>
        <p><?php echo $article['yearCreated']?> год</p>
        <p><?php echo $article['description']?></p>
    </div>
    <?php endforeach; ?>
</div>
