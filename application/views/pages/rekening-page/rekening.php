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

                                        <h4 class="mt-0 header-title">Form Generate Rekening</h4>
                                        <p class="text-muted m-b-30 font-14">
                                            Silahkan klik tombol <b>Buat Rekening</b> untuk membuat Rekening baru.
                                        </p>

                                        <?php echo $this->session->flashdata('message'); ?>

                                        <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newRekeningModal">Buat Rekening</a>

                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>#</th>
                                                        <th>CIF</th>
                                                        <th>No. Rekening</th>
                                                        <th>Nama Nasabah</th>
                                                        <th>Kantor Bank Jateng</th>
                                                        <th>Status Rekening</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($dataRekening as $rekening) : ?>
                                                        <tr class="text-center">
                                                            <th scope="row"><?= $no; ?></th>
                                                            <td style="font-weight: 300;"><?= $rekening['cif']; ?></td>
                                                            <td style="font-weight: 300;"><?= $rekening['no_rekening']; ?></td>
                                                            <td style="font-weight: 300;"><?= $rekening['nama_nasabah']; ?></td>
                                                            <td style="font-weight: 300;"><?= $rekening['nama_kantor_bank_jateng']; ?></td>
                                                            <?php if ($rekening['status_rekening'] == 0) : ?>
                                                                <td style="font-weight: 300;">Tidak Aktif</td>
                                                            <?php else : ?>
                                                                <td style="font-weight: 300;">Aktif</td>
                                                            <?php endif; ?>

                                                            <td>
                                                                <a class="btn-hapus" href="<?= base_url('rekening/deleterekening/') . encrypt_url($rekening['id']); ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
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
                    <h5 class="modal-title" id="newRekeningModalLabel">Tambah Rekening Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('rekening/generaterekening'); ?>" method="POST">
                    <div class="modal-body">
                        <label for="data_cif_nasabah">Data CIF Nasabah</label>
                        <div class="form-group">
                            <select name="data_cif_nasabah" id="data_cif_nasabah" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Menu</option>
                                <?php foreach ($dataCIF as $cif) : ?>
                                    <option value="<?= $cif['id']; ?>"><?= $cif['cif']; ?> - <?= $cif['nama_nasabah']; ?></option>
                                <?php endforeach; ?>
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
    <!-- END TAMBAH REKENING MODAL -->