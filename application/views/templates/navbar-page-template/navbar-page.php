<!-- Top Bar Start -->
<div class="topbar">

    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">

            <a href="#" class="logo"><img src="assets/images/logos/circle-logo-bank-jateng.png" height="50" alt="logo"></a>
        </div>
    </div>

    <nav class="navbar-custom">



        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item">
                <p style="font-size: 15px;" class="text-white"><?= $user['nama']; ?></p>
            </li>

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <?php if ($this->session->userdata('role_id') == 1) : ?>
                        <img src="assets/images/users/user-administrator.png" alt="user" class="rounded-circle">
                    <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                        <img src="assets/images/users/user-administrator.png" alt="user" class="rounded-circle">
                    <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                        <img src="assets/images/users/default.png" alt="user" class="rounded-circle">
                    <?php endif; ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutFromSubMenuModal"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="ion-navicon"></i>
                </button>
            </li>
        </ul>

        <div class="clearfix"></div>

    </nav>

</div>
<!-- Top Bar End -->


<!-- START LOGOUT FROM NAVBAR MENU MODAL -->
<div class="modal fade" id="logoutFromSubMenuModal" tabindex="-1" aria-labelledby="logoutFromSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutFromSubMenuModalLabel">Apakah kamu akan keluar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Klik tombol "Logout" untuk keluar dari halaman, klik "Close" untuk membatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- END LOGOUT FROM NAVBAR MENU MODAL -->