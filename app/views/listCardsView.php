<?= $this->setSiteTile('View List cards') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: white;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>
<div class="cards-header">
    <h2 class="cards-title">View List cards</h2>
    <a href="<?php echo route('/trello/getBoardData') ?>" class="cards-btn">Go To Board</a>
</div>

<div class="list-card">


<?php $urlGetBoradListCards = $data['urlGetBoradListCards'] ?>

<?php
$boardId = $urlGetBoradListCards[0]->idBoard;
$listId = $urlGetBoradListCards[0]->idList;

foreach ($urlGetBoradListCards as $key => $value) {
?>
    <div class="card-name">
        <p>
        <?= $value->name ?>
        </p> 
    </div>
<?php
}

?>


    <form action=" <?php echo route('/trello/createCard/' . $boardId . '/' . $listId) ?> " method="POST" class="create-card">
        <label class="create-card-label" for="card">Create Card</label>
        <input class="create-card-input" type="card" name="card" placeholder="card" required>
        <div>
            <button type="submit" class="create-btn">Add</button>
        </div>
    </form>
</div>
</div>
<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>