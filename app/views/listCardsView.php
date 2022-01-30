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

// dd($urlGetBoradListCards);
foreach ($urlGetBoradListCards as $key => $value) {
?>

    <h2>
        <?= $value->name ?>
    </h2>
<?php
}

?>


<div>
    <form action=" <?php echo route('/trello/createCard') ?> " method="POST">
        <label class="reg-field-label" for="card">Create Card</label>
        <input class="reg-field-input" type="card" name="card" placeholder="card" required>
        <div>

            <button type="submit" class="reg-fonfirm-btn">Add</button>
        </div>
    </form>

</div>

<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>