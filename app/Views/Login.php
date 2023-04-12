<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>
<?php include('fe/header-inc.php') ?>

<div class="background-login">
    <div class="right-section">
        <div class="right-inner">
            <div class="right-inner-inner">
                <div class="change login register">
                    <button onclick="changeLogin()" class="active" id="login-button">Login</button>
                    <button onclick="changeRegister()" id="register-button">Register</button>
                </div>
                <div class="card-body" id="login">
                    <?php if (session('error') !== null) : ?>
                        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                    <?php elseif (session('errors') !== null) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php if (is_array(session('errors'))) : ?>
                                <?php foreach (session('errors') as $error) : ?>
                                    <?= $error ?>
                                    <br>
                                <?php endforeach ?>
                            <?php else : ?>
                                <?= session('errors') ?>
                            <?php endif ?>
                        </div>
                    <?php endif ?>

                    <?php if (session('message') !== null) : ?>
                        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                    <?php endif ?>

                    <form action="<?= url_to('login') ?>" method="post">
                        <?= csrf_field() ?>

                        <!-- Email -->
                        <div class="mb-2">
                            <span class="fa fa-email-o input-icon"></span>
                            <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email"
                                   placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required/>
                        </div>

                        <!-- Password -->
                        <div class="mb-2">
                            <span class="fa fa-lock-o input-icon"></span>
                            <input type="password" class="form-control" name="password" inputmode="text"
                                   autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required/>
                        </div>

                        <div class="d-grid col-12 mx-auto m-3">
                            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.login') ?></button>
                        </div>

                        <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                            <p class="text-center pw-forgot"><?= lang('Auth.forgotPassword') ?> <a
                                        href="<?= url_to('magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a></p>
                        <?php endif ?>

                    </form>
                </div>


                <div class="card-body" id="register" style="display: none">
                    <?php if (session('error') !== null) : ?>
                        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                    <?php elseif (session('errors') !== null) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php if (is_array(session('errors'))) : ?>
                                <?php foreach (session('errors') as $error) : ?>
                                    <?= $error ?>
                                    <br>
                                <?php endforeach ?>
                            <?php else : ?>
                                <?= session('errors') ?>
                            <?php endif ?>
                        </div>
                    <?php endif ?>

                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <!-- Email -->
                        <div class="mb-1">
                            <span class="fa fa-email-o input-icon"></span>

                            <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email"
                                   placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required/>
                        </div>

                        <!-- Username -->
                        <div class="mb-4">
                            <span class="fa fa-user-o input-icon"></span>

                            <input type="text" class="form-control" name="username" inputmode="text"
                                   autocomplete="username" placeholder="<?= lang('Auth.username') ?>"
                                   value="<?= old('username') ?>" required/>
                        </div>

                        <!-- Password -->
                        <div class="mb-1">
                            <span class="fa fa-lock-o input-icon"></span>

                            <input type="password" class="form-control" name="password" inputmode="text"
                                   autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required/>
                        </div>

                        <!-- Password (Again) -->
                        <div class="mb-1">
                            <span class="fa fa-lock-o input-icon"></span>

                            <input type="password" class="form-control" name="password_confirm" inputmode="text"
                                   autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>"
                                   required/>
                        </div>

                        <div class="d-grid col-12 mx-auto m-3">
                            <button type="submit"
                                    class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('fe/footer.php') ?>

<style>
    body p, body a{
        color: #5f81a3;
        }
    .background-login {
        width: 100%;
        height: 100vh;
        background-size: cover;
        position: relative;
        }

    h5 {
        font-weight: 400;
        }

    .menu {
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1;
        }

    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        }

    footer .menu {
        position: unset;
        }

    .section-two {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        margin: 0;
        }

    body > .container {
        padding: 0;
        }

    .container, .inner {
        width: 100%;
        max-width: 100%;
        }

    .right-section {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        }

    .right-inner {
        height: auto;
        width: 400px;
        margin: 0 auto;
        background: #fff;
        }

    .right-inner-inner {

        }

    input.form-control {
        background: #f1f1f1;
        width: 100%;
        padding: 15px 0;
        margin-bottom: 10px;
        border: none;
        text-indent: 60px;
        height: 40px;
        border-radius: 0;
        }

    .change.login.register {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        }

    .change.login.register button.active {
        background: #fff;
        color: black

        }


    button.btn.btn-primary.btn-block, .change.login.register button {
        background: #5f81a3;
        border: none;
        padding: 7px 0;
        border-radius: 0;
        text-align: center;
        width: 100%;
        color: #fff;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s ease;
        -webkit-transition: 0.3s ease;
        -moz-transition: 0.3s ease;
        -ms-transition: 0.3s ease;
        }

    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        }

    .input-icon {
        position: absolute;
        margin-top: 5px;
        margin-left: 5px;
        }

    .fa-email-o:before, .fa-lock-o:before, .fa-user-o:before {
        content: "";
        background: url('source/img/icons/email.png') no-repeat 0 0;
        display: inline-block;
        height: 32px;
        width: 32px;
        background-size: 32px 32px;
        margin-left: 5px;
        }

    .fa-lock-o:before {
        background: url('source/img/icons/lock.png') no-repeat 0 0;
        background-size: 32px 32px;
        }

    .fa-user-o:before {
        background: url('source/img/icons/user.png') no-repeat 0 0;
        background-size: 32px 32px;
        }

    .input-icon:after {
        content: "";
        display: block;
        height: 40px;
        width: 1px;
        background: #ddd;
        position: absolute;
        margin-top: -39px;
        left: 45px;
        }

    .pw-forgot {
        display: grid;
        margin: 0;
        }

    @media (max-width: 750px) {
        .right-inner {
            width: 90%;
            }
        }
</style>
<script>
    function changeLogin() {
        document.getElementById("register").style.display = "none";
        document.getElementById("login").style.display = "block";
        document.getElementById("login-button").classList.add("active");
        document.getElementById("register-button").classList.remove("active");
    }

    function changeRegister() {
        document.getElementById("login").style.display = "none";
        document.getElementById("register").style.display = "block";
        document.getElementById("login-button").classList.remove("active");
        document.getElementById("register-button").classList.add("active");
    }
</script>

<?= $this->endSection() ?>
