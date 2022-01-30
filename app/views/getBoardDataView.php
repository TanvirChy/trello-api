<?= $this->setSiteTile('Board View') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<h2>See The Boad </h2>

<?php $getBoardData = $data['getBoradData'] ?>
<?php $urlGetBoardLists = $data['urlGetBoardLists'] ?>

<h1><?php echo $getBoardData->name ?></h1>
<p> <?php echo $getBoardData->desc ?></p>



<?php

foreach ($urlGetBoardLists as $key => $value) {
?>
    
    <a href="<?php echo route('/trello/boardList/' . $value->id) ?>">

        <h3><?= $value->name ?></h3>
    </a>
<?php
}

?>


<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>