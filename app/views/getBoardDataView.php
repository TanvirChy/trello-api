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
<?php $getBoardAllCards = $data['getBoardAllCards'] ?>

<h1><?php echo $getBoardData->name ?></h1>
<p> <?php echo $getBoardData->desc ?></p>



<?php

dd($getBoardAllCards)

?>


<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>