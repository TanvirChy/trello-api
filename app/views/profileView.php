<?= $this->setSiteTile('PROFILE') ?>

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
        <div class="profile-page-pic">
            <img class="profile-sign-img" src="<?= img_path('signup/signupPagePic.jpg') ?>" alt="">
            <form action="<?php echo route('/page/takeDeleteUser') ?>" class="profile-page-form" method="POST">
                <button type="submit" name="delete" class="profile-btn">DELETE</button>
            </form>
        </div>
        <div class="reg-form-part">
            <div class="reg-head">
                <p class="reg-text">PROFILE</p>
                <span class="reg-span">You can update your profile.</span>
            </div>
            <div class="reg-input-form">
                <form class="reg-form" action="<?= route('/page/takeUpdateProfile') ?>" method="POST">
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
                        <!-- <button class="reg-cancel-btn">DELETE</button> -->
                        <button type="submit" class="reg-fonfirm-btn">UPDATE</button>
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