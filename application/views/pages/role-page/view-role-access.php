<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <?php
    $this->load->view('templates/sidebar-page-template/sidebar-page');
    ?>

    <!-- Start right Content here -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <!-- Top Bar Start -->
            <?php
            $this->load->view('templates/navbar-page-template/navbar-page');
            ?>

            <div class="page-content-wrapper ">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="float-right page-breadcrumb">
                                <!-- <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item active">Starter</li>
                                </ol> -->
                            </div>
                            <h5 class="page-title"><?= $title; ?></h5>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Halaman Role Access</h4>
                                    <p class="text-muted m-b-30 font-14">
                                        Pada halaman ini admin dapat merubah hak akses menu pada setiap role.
                                        Silahkan <b>Ceklis</b> untuk dapat memberikan hak akses menu.
                                    </p>

                                    <?= $this->session->flashdata('message'); ?>

                                    <h4>Role : <?php echo $role['nama_role']; ?></h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Menu - URL</th>
                                                    <th>Access</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($menu as $m) : ?>
                                                    <tr class="text-center">
                                                        <th scope="row"><?php echo $no; ?></th>
                                                        <td><?php echo $m['title']; ?> - <?php echo $m['url']; ?></td>
                                                        <td>
                                                            <div class="form-check mb-4">
                                                                <input class="form-check-input" type="checkbox" <?php echo check_access($role['id'], $m['id']); ?> data-role="<?php echo encrypt_url($role['id']); ?>" data-menu="<?php echo $m['id']; ?>">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <!--end col-->
                    </div>
                </div><!-- container fluid -->

            </div> <!-- Page content Wrapper -->

        </div> <!-- content -->

        <?php
        $this->load->view('templates/footer-text/footer');
        ?>

    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->

<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?php echo base_url('role/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?php echo base_url('role/roleaccess/'); ?>" + roleId; //ini seperti redirect,namun di ajax
            }
        });
    });
</script>