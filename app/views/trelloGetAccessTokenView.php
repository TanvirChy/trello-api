<?= $this->setSiteTile('Registration') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<h2 class="get-access-view-header">Trello getAccessTokenView.</h2>
<?php $urlWithKey = $data['urlWithKey'] ?>


<div >
    
    <a href="<?= $urlWithKey ?>" class="trigger-btn">Trigger</a>
</div>


<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>