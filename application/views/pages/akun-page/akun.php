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

                                        <h4 class="mt-0 header-title">Form Generate Akun</h4>
                                        <p class="text-muted m-b-30 font-14">
                                            Silahkan klik tombol <b>Buat Akun</b> untuk membuat Akun baru.
                                        </p>

                                        <?php echo $this->session->flashdata('message'); ?>

                                        <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newRekeningModal">Buat Akun</a>

                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($data_akun as $akun) : ?>
                                                        <tr class="text-center">
                                                            <th scope="row"><?= $no; ?></th>
                                                            <td style="font-weight: 300;"><?= $akun['nama']; ?></td>
                                                            <td style="font-weight: 300;"><?= $akun['username']; ?></td>
                                                            <td style="font-weight: 300;"><?= $akun['email']; ?></td>

                                                            <?php if ($akun['role_id'] == 3) : ?>
                                                                <td style="font-weight: 300;">CSR/Operator</td>
                                                            <?php endif; ?>

                                                            <td>
                                                                <a href="#" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light" data-toggle="modal" data-target="#newEditAkunModal<?= $akun['id']; ?>">Edit</span></a>
                                                                <a class="btn-hapus" href="<?= base_url('akun/deleteakun/') . encrypt_url($akun['id']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
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


    <!-- START TAMBAH REKENING MODAL -->
    <div class="modal fade" id="newRekeningModal" tabindex="-1" aria-labelledby="newRekeningModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRekeningModalLabel">Tambah Akun Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('akun/generateakun'); ?>" method="POST">
                    <div class="modal-body">
                        <label for="nama">Nama</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Akun" autocomplete="off" required>
                        </div>
                        <label for="username">Username</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Input Username Akun" autocomplete="off" required>
                        </div>
                        <label for="email">Email</label>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Input Email Akun" autocomplete="off" required>
                        </div>
                        <label for="password">Password</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Input Password Nasabah" autocomplete="off" required>
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
    <!-- END TAMBAH REKENING MODAL -->

    <!-- START TAMBAH REKENING MODAL -->
    <?php
    foreach ($data_akun as $akun) :  ?>
        <div class="modal fade" id="newEditAkunModal<?php echo $akun['id']; ?>" tabindex="-1" aria-labelledby="newEditAkunModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newEditAkunModalLabel">Edit Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('akun/editakun'); ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $akun['id']; ?>">
                        <div class="modal-body">
                            <label for="nama">Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Akun" autocomplete="off" required value="<?= $akun['nama'] ?>">
                            </div>
                            <label for="username">Username</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Input Username Akun" autocomplete="off" required value="<?= $akun['username'] ?>">
                            </div>
                            <label for="email">Email</label>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Input Email Akun" autocomplete="off" required value="<?= $akun['email'] ?>">
                            </div>
                            <label for="password">Password</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Input Password Nasabah" autocomplete="off" required>
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
    <!-- END TAMBAH REKENING MODAL -->