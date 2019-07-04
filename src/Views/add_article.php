<!--форма добавления картины-->
<?php if (isset($addResult)):?>
<h4><?php echo $addResult; ?></h4>
<?php endif; ?>


<form method="post" action="/article/add" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Название Статьи</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="название" required>
    </div>
    <div class="form-group">
        <label for="description">Описание статьи</label>
        <textarea class="form-control" id="description" name="description" placeholder="описание" required></textarea>
    </div>
    <div class="form-group">
        <label for="yearCreated">Год написания статьи</label>
        <input type="date" id="yearCreated" name="yearCreated" required>
    </div>
    
    <button type="submit" class="btn btn-secondary">Добавить</button>
</form>
