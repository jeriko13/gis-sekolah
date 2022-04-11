<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="<?= base_url() ?>template/assets/img/jeri.jpg" class="user-image img-responsive" />
            </li>


            <li>
                <a href="<?= base_url('home') ?>"><i class="fa fa-globe fa-1x"></i> Pemetaan</a>
            </li>
            <li>
                <a href="<?= base_url('sekolah') ?>"><i class="fa fa-building fa-1x"></i> Sekolah</a>
            </li>
            <?php if ($this->session->userdata('username') <> "") { ?>
                <li>
                    <a href="<?= base_url('sekolah/input') ?>"><i class="fa fa-plus fa-1x"></i> Input Sekolah</a>
                </li>
                <li>
                    <a href="<?= base_url('user') ?>"><i class="fa fa-user fa-1x"></i> User</a>
                </li>
                <li>
                    <a href="<?= base_url('user/input') ?>"><i class="fa fa-circle fa-1x"></i> Input User</a>
                </li>
            <?php } ?>

        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $title ?></h2>


            </div>
        </div>
        <!-- /. ROW  -->
        <hr />