<?= $this->setSiteTile('Registration') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<h2>Trello getAccessTokenView.</h2>
<?php $urlWithKey = $data['urlWithKey'] ?>
<?php echo $urlWithKey ?>

<div >
    
    <a href="<?= $urlWithKey ?>">Trigger</a>
</div>


<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>