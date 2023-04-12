<nav class="navbar p-0 fixed-top d-flex flex-row d-none">
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" href="<?= site_url('Account/Management') ?>">+ <?= lang('Global.new_betting')?></a>
            </li>

            <li class="nav-item nav-settings d-none d-lg-block border-left">
                <a class="nav-link" href="<?= site_url('Account/Settings') ?>">
                    <i class="mdi mdi-settings text-success"></i>
                </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block border-left">
                <a class="nav-link" href="<?= site_url('logout') ?>">
                    <i class="mdi mdi-logout text-danger"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>


