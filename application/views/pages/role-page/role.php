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

                                    <h4 class="mt-0 header-title">Halaman Data Role User</h4>
                                    <p class="text-muted m-b-30 font-14">
                                        Pada halaman ini admin dapat menambahkan role user,
                                        mengedit role user, serta menghapus role user.
                                        Untuk memulai penambahan role user silahkan klik tomboh <b>Tambah Role</b> dibawah ini.
                                    </p>

                                    <?php echo $this->session->flashdata('message'); ?>

                                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Role</a>

                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Nama Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($role as $r) : ?>
                                                    <tr class="text-center">
                                                        <th scope="row"><?php echo $no; ?></th>
                                                        <td><?php echo $r['nama_role']; ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url('role/roleaccess/') . encrypt_url($r['id']); ?>" class="mr-3"><span class="btn btn-sm btn-warning waves-effect waves-light">access</span></a>
                                                            <a href="#" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light" data-toggle="modal" data-target="#newEditRoleModal<?php echo $r['id']; ?>">Edit</span></a>
                                                            <a class="btn-hapus" href="<?php echo base_url('role/deleterole/') . encrypt_url($r['id']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
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

<!-- START TAMBAH Role MODAL -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Role Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('role'); ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_role">Nama Role</label>
                        <input type="text" class="form-control" id="nama_role" name="nama_role" placeholder="Nama Role" autocomplete="off" value="<?= set_value('nama_role'); ?>" required>
                        <small class="text-danger"><?php echo form_error('nama_role'); ?></small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END TAMBAH Role MODAL -->

<!-- START EDIT Role MODAL -->
<?php
foreach ($role as $r) :  ?>
    <div class="modal fade" id="newEditRoleModal<?php echo $r['id']; ?>" tabindex="-1" aria-labelledby="newEditRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditRoleModalLabel">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>role/editrole" method="POST">
                    <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_role">Nama Role</label><br>
                            <input type="text" class="form-control" id="nama_role" name="nama_role" placeholder="Nama Role" autocomplete="off" value="<?php echo $r['nama_role']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- END EDIT Role MODAL -->