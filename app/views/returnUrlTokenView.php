<?= $this->setSiteTile('return url token') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<h2 class="return-bord-title">Click the button and see the board .</h2>

<a class="trigger-btn" href="<?php echo route('/trello/getBoardData') ?>">See Board</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajax({
        type: "POST",
        url: 'http://localhost/trelloapi/trello/takeHash',
        data: window.location.hash,
        success: function(response) {
            console.log(response);
        }
    });
</script>


<?= $this->end() ?>


<?= $this->start('script') ?>



<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>