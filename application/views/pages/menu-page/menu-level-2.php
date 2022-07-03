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

                                    <h4 class="mt-0 header-title">Halaman Data Menu Management Level 2</h4>
                                    <p class="text-muted m-b-30 font-14">
                                        Pada halaman ini admin dapat menambahkan menu level 2,
                                        mengedit menu level 2, serta menghapus menu level 2.
                                        Untuk memulai penambahan menu level 2 silahkan klik tomboh <b>Tambah Menu level 2</b> dibawah ini.
                                    </p>

                                    <?php echo $this->session->flashdata('message'); ?>

                                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newHasSubMenuModal">Tambah Menu Level 2</a>

                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Menu Level 1</th>
                                                    <th>Url</th>
                                                    <th>Active</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($menuleveldua as $mld) : ?>
                                                    <tr class="text-center">
                                                        <th scope="row"><?php echo $no; ?></th>
                                                        <td><?php echo $mld['title']; ?></td>
                                                        <td><?php echo $mld['title2']; ?></td>
                                                        <td><?php echo $mld['url']; ?></td>
                                                        <?php if ($mld['is_active'] == 1) : ?>
                                                            <td>
                                                                Aktif
                                                            </td>
                                                        <?php elseif ($mld['is_active'] == 0) : ?>
                                                            <td>
                                                                Tidak Aktif
                                                            </td>
                                                        <?php endif; ?>
                                                        <td>
                                                            <a href="#"><span class="btn btn-sm btn-success waves-effect waves-light" data-toggle="modal" data-target="#newEditMenuLevelDuaModal<?php echo $mld['id']; ?>">Edit</span></a>
                                                            <a class="btn-hapus" href="<?php echo base_url('menu/deletemenuleveldua/') . $mld['id']; ?>"><span class="btn btn-sm btn-danger waves-effect waves-light">Delete</span></a>
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

<!-- START TAMBAH SUBMENU MODAL -->
<div class="modal fade" id="newHasSubMenuModal" tabindex="-1" aria-labelledby="newHasSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newHasSubMenuModalLabel">Tambah Submenu Level 2 Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo base_url(); ?>menulevel2" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <p>Jika diberi submenu level 3 ,mohon isikan kolom url dengan tanda #</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu level 2 title" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="menu_id">Select Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?php echo $m['id']; ?>"><?php echo $m['title']; ?> - <?php echo $m['url']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu level 2 url" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
<!-- END TAMBAH SUBMENU MODAL -->

<!-- START EDIT SUBMENU MODAL -->
<?php
foreach ($menuleveldua as $mld) :  ?>
    <div class="modal fade" id="newEditMenuLevelDuaModal<?php echo $mld['id']; ?>" tabindex="-1" aria-labelledby="newEditMenuLevelDuaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditMenuLevelDuaModalLabel">Edit Menu Level 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>menu/editmenulevel2" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <p>Jika diberi submenu level 3 ,mohon isikan kolom url dengan tanda #</p>
                        </div>
                        <div class="form-group">
                            <label for="menu_id">Title</label>
                            <input name="id" type="hidden" value="<?php echo $mld['id']; ?>">
                            <input name="menu_id" type="hidden" value="<?php echo $mld['id_menu_level_1']; ?>">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu level 2 title" autocomplete="off" value="<?php echo $mld['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_menu_level_1">Select Menu</label>
                            <select name="id_menu_level_1" id="id_menu_level_1" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?php echo $m['id']; ?>"><?php echo $m['title']; ?> - <?php echo $m['url']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu level 2 url" autocomplete="off" value="<?php echo $mld['url']; ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
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
<!-- END EDIT SUBMENU MODAL -->