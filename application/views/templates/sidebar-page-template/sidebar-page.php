<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">

            <a href="#" class="logo"><img src="assets/images/logos/circle-logo-bank-jateng.png" height="100" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <!-- Start Pembuatan Menu Level 1 -->
                <?php
                $role_id = $this->session->userdata('role_id');

                $this->db->select('menu_level_1.*');
                $this->db->from('menu_level_1');
                $this->db->join('user_access_menu', 'user_access_menu.id_menu_level_1 = menu_level_1.id');
                $this->db->where('user_access_menu.role_id', $role_id);
                $this->db->order_by('user_access_menu.id_menu_level_1', 'asc');

                $menu_1 = $this->db->get()->result_array();
                ?>
                <!-- End Pembuatan Menu Level 1 -->

                <li class="menu-title">Main</li>

                <?php foreach ($menu_1 as $m1) : ?>
                    <?php if ($m1['status_sub'] == 0) : ?>
                        <li>
                            <a href="<?= $m1['url']; ?>" class="waves-effect">
                                <i class="<?= $m1['icon']; ?>"></i>
                                <span> <?= $m1['title']; ?> <span class="badge badge-success badge-pill float-right"></span></span>
                            </a>
                        </li>
                    <?php else : ?>
                        <!-- Start Pembuatan Menu Level 2 -->
                        <?php
                        $id_menu_level_1 = $m1['id'];
                        $role_id = $this->session->userdata('role_id');

                        $this->db->select('menu_level_2.*');
                        $this->db->from('menu_level_2');
                        $this->db->join('menu_level_1', 'menu_level_1.id = menu_level_2.id_menu_level_1');
                        $this->db->where('menu_level_2.id_menu_level_1', $id_menu_level_1);
                        $this->db->where('menu_level_2.is_active', 1);

                        $menu_2 = $this->db->get()->result_array();
                        ?>
                        <!-- End Pembuatan Menu Level 2 -->
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="<?= $m1['icon']; ?>"></i> <span> <?= $m1['title']; ?> </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <?php foreach ($menu_2 as $m2) : ?>
                                    <li><a href="<?= $m2['url']; ?>"><?= $m2['title']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>


                <!-- 
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> Master Rekening </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('rekening'); ?>">Generate Rekening</a></li>
                        <li><a href="<?= base_url('rekening/accrekening'); ?>">ACC Rekening</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> Master Akun </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('akun'); ?>">Buat Akun</a></li>
                    </ul>
                </li> -->

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->