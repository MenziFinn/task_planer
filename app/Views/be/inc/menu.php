<nav class="sidebar sidebar-offcanvas" id="sidebar" style="min-height: 100vh">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="<?= site_url('Account/Dashboard') ?>">
            <img src="<?= site_url() ?>source/img/logo-text.svg" alt="logo"/>
        </a>
        <a class="sidebar-brand brand-logo-mini" href="<?= site_url('Account/Dashboard') ?>">
            <img src="<?= site_url() ?>source/img/logo.png" alt="logo"/>
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link"></span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url('Account/Dashboard'); ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title"><?= lang('Dashboard.page_title') ?></span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url('Account/Management'); ?>">
                <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
                <span class="menu-title"><?= lang('Management.page_title') ?></span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url('Account/Wealth'); ?>">
              <span class="menu-icon">
                <i class="mdi mdi-bank"></i>
              </span>
                <span class="menu-title"><?= lang('WealthManagement.page_title') ?></span>
            </a>
        </li>
    </ul>
</nav>

