<?= $this->setSiteTile('Index') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dff;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<h2>User Management System With MVC Framework</h2>

<p>Hello Mr. <?= $currentUserInfo['name'] ?> . Welcome to Our User Management System. </p>
    
    <a href=<?= route('/page/profile')?> >GO PROFILE</a>

<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>