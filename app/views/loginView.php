<?= $this->setSiteTile('LOGIN') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>
<?php

use App\Core\Session;

if (Session::exits('notFoundUser')) {
    $message = Session::get('notFoundUser');
    Session::delete('notFoundUser');
   
} 
// dd($message);
?>


<div class="reg-container">
    <div class="main-content">
        <div class="reg-pic">
            <img class="reg-signup-img" src="<?= img_path('signin/signInLogo.png') ?>" alt="">
        </div>
        <div class="reg-form-part">
            <div class="reg-head">
                <p class="reg-text">Sign In</p>
                <?php 
                
                if(isset($message)){ ?>
                   <span> <?= $message  ?> </span>
               <?php }
                
                ?>
                
            </div>
            <div class="reg-input-form">
                <form class="reg-form" action="<?= route('/page/takeDataLogin') ?>" method="POST">

                    <div class="reg-input-field">
                        <label class="reg-field-label" for="email">Email</label>
                        <input class="reg-field-input" type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="reg-input-field">
                        <label class="reg-field-label" for="password">Password</label>
                        <input class="reg-field-input" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="btn">

                        <button type="submit" class="reg-fonfirm-btn">CONFIRM</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<footer>

</footer>

<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>