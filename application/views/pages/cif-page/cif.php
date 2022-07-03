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

                                        <h4 class="mt-0 header-title">Form Generate CIF</h4>
                                        <p class="text-muted m-b-30 font-14">
                                            Silahkan klik tombol <b>Buat Nomor CIF</b> untuk membuat nomor CIF baru.
                                        </p>

                                        <?php echo $this->session->flashdata('message'); ?>

                                        <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newCIFModal">Buat Nomor CIF</a>

                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>#</th>
                                                        <th>CIF</th>
                                                        <th>Nama Nasabah</th>
                                                        <th>Alamat</th>
                                                        <th>Kantor Bank Jateng</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($dataCIF as $cif) : ?>
                                                        <tr class="text-center">
                                                            <th scope="row"><?= $no; ?></th>
                                                            <td style="font-weight: 300;"><?= $cif['cif']; ?></td>
                                                            <td style="font-weight: 300;"><?= $cif['nama_nasabah']; ?></td>
                                                            <td style="font-weight: 300;"><?= $cif['alamat_nasabah']; ?></td>
                                                            <td style="font-weight: 300;"><?= $cif['nama_kantor_bank_jateng']; ?></td>
                                                            <td>
                                                                <a href="#" class="mr-3"><span class="btn btn-sm btn-success waves-effect waves-light" data-toggle="modal" data-target="#newEditCIFModal<?= $cif['id']; ?>">Edit</span></a>
                                                                <a class="btn-hapus" href="<?= base_url('cif/deletecif/') . encrypt_url($cif['id']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
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


    <!-- START TAMBAH CIF MODAL -->
    <div class="modal fade" id="newCIFModal" tabindex="-1" aria-labelledby="newCIFModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCIFModalLabel">Tambah Nomor CIF Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('cif/generatecif'); ?>" method="POST">
                    <div class="modal-body">
                        <label for="kantor_bank_jateng">Kantor Bank Jateng</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="kantor_bank_jateng" name="kantor_bank_jateng" placeholder="Input Kantor Bank Jateng" autocomplete="off" required>
                        </div>
                        <label for="nama">Nama</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Nasabah" autocomplete="off" required>
                        </div>
                        <label for="alamat">Alamat</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input Alamat Nasabah" autocomplete="off" required>
                        </div>
                        <label for="tanda_pengenal">Tanda Pengenal</label>
                        <div class="form-group">
                            <select name="tanda_pengenal" id="tanda_pengenal" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Menu</option>
                                <option value="ktp-sim">KTP/SIM</option>
                            </select>
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
    <!-- END TAMBAH CIF MODAL -->

    <!-- START EDIT MENU MODAL -->
    <?php
    foreach ($dataCIF as $cif) :  ?>
        <div class="modal fade" id="newEditCIFModal<?php echo $cif['id']; ?>" tabindex="-1" aria-labelledby="newEditCIFModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newEditCIFModalLabel">Edit CIF</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url(); ?>cif/editcif" method="POST">
                        <input type="hidden" name="id" value="<?= $cif['id']; ?>">
                        <div class="modal-body">
                            <label for="kantor_bank_jateng">Kantor Bank Jateng</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kantor_bank_jateng" name="kantor_bank_jateng" placeholder="Input Kantor Bank Jateng" autocomplete="off" required value="<?= $cif['nama_kantor_bank_jateng']; ?>">
                            </div>
                            <label for="nama">Nama</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Nasabah" autocomplete="off" required value="<?= $cif['nama_nasabah']; ?>">
                            </div>
                            <label for="alamat">Alamat</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input Alamat Nasabah" autocomplete="off" required value="<?= $cif['alamat_nasabah']; ?>">
                            </div>
                            <label for="tanda_pengenal">Tanda Pengenal</label>
                            <div class="form-group">
                                <select name="tanda_pengenal" id="tanda_pengenal" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="">Select Menu</option>
                                    <option value="ktp-sim">KTP/SIM</option>
                                </select>
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
    <!-- END EDIT MENU MODAL -->