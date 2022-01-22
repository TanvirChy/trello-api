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

    <form action="<?= route('/trello/takeKey') ?>" method="POST">
        <label for="key">Key</label>
        <input type="text" name="key" placeholder="key">
        <button type="submit">Submit</button>
    </form>
</div>




<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>