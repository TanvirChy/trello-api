<?= $this->setSiteTile('Registration') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<h2>Trello Authorigation.</h2>

<div>

    <form action="">
        <label for="key">Key</label>
        <input type="text" name="key" placeholder="key">
        <label for="token">Token</label>
        <input type="text" name="token" placeholder="token">
    </form>
</div>




<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>