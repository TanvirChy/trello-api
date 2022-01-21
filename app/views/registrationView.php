<?= $this->setSiteTile('REGISTRATION') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dfffdf;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<div class="reg-container">
    <div class="main-content">
        <div class="reg-pic">
            <img class="reg-signup-img" src="<?= img_path('signup/signupPagePic.jpg') ?>" alt="">
        </div>
        <div class="reg-form-part">
            <div class="reg-head">
                <p class="reg-text">Registration</p>
                <span class="reg-span">Click For Your Shoot.</span>
            </div>
            <div class="reg-input-form">
                <form class="reg-form" action="<?= route('/page/takeDataRegistration') ?>" method="POST">
                    <div class="reg-input-field">
                        <label class="reg-field-label" for="name">Name</label>
                        <input class="reg-field-input" type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="reg-input-field">
                        <label class="reg-field-label" for="email">Email</label>
                        <input class="reg-field-input" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="reg-input-field">
                        <label class="reg-field-label" for="phone">Phone</label>
                        <input class="reg-field-input" type="text" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="reg-input-field">
                        <label class="reg-field-label" for="country">Country</label>
                        <input class="reg-field-input" type="text" name="country" placeholder="Country" required>
                    </div>
                    <div class="reg-input-field">
                        <label class="reg-field-label" for="password">Password</label>
                        <input class="reg-field-input" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <!-- <button class="reg-cancel-btn">CANCEL</button> -->
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