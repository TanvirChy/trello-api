<?= $this->setSiteTile('Index') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dff;
    }

    table,
    th,
    td {
        width: 50%;
        border: 1px solid black;
        text-align: center;
        margin: 5px;
        padding: 2px;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>
<h2>Page View</h2>
<h2>MVC Framework</h2>


<table class="student-table">
    <tr>
        <th>USER ID</th>
        <th>ID</th>
        <th>TITLE</th>
        <th>COMPLETED</th>
    </tr>

    <?php foreach ($getDataFromServer as $user) : ?>
        <tr>
            <td><?= $user->userId ?></td>
            <td><?= $user->id ?></td>
            <td><?= $user->title ?></td>
            <td><?= $user->completed ?></td>
        </tr>
    <?php endforeach; ?>



</table>

<?= $this->end() ?>

<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>
<?= $this->end() ?>