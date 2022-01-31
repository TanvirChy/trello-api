<?= $this->setSiteTile('Board View') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>


<?php $getBoardData = $data['getBoradData'] ?>
<?php $urlGetBoardLists = $data['urlGetBoardLists'] ?>
<div class="board-view-hearder">

    <h1 class="board-view-title"><?php echo $getBoardData->name ?></h1>
    <p class="board-view-desc"> <?php echo $getBoardData->desc ?></p>
</div>
<div class="board-lists-view">

    <?php

    foreach ($urlGetBoardLists as $key => $value) {
    ?>

        <a href="<?php echo route('/trello/boardList/' . $value->id) ?>" class="board-redict-tag">
            <h3 class="single-list"><?= $value->name ?></h3>
        </a>
    <?php
    }
    ?>

</div>

<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>