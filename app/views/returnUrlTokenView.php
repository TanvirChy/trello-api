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

<!-- <script>
    window.addEventListener('DOMContentLoaded', (event) => {
        let accessTokeWithUrl = window.location.hash;
        fetch({
                method: 'POST',
                url: 'http://localhost/trelloapi/trello/index',
                body: accessTokeWithUrl
            }).then(data => {
                console.log(data);
            })
            .catch(err => {
                console.log(err)
            })

    });

    <button onclick="DOMContentLoaded">Click to fire event</button>
    
</script> -->


<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>