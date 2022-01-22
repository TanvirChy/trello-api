<?= $this->setSiteTile('return url token') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<h2>Return url token </h2>


<?php $_SESSION['accessToken'] = '<script>window.location.href</script>'; ?>


<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    //  let accessToken = window.location.href


    // set('accessToken',accessToken)
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>