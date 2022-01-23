<?= $this->setSiteTile('View List cards') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<h2>View List cards</h2>


<?php $urlGetBoradListCards = $data['urlGetBoradListCards'] ?>

<?php


foreach ($urlGetBoradListCards as $key => $value) {
?>

    <h2>
        <?= $value->name ?>
    </h2>
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