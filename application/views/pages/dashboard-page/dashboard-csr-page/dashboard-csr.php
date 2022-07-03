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
            <!-- Top Bar End -->

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
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat m-b-30">
                                <div class="p-3 bg-primary text-white">
                                    <div class="mini-stat-icon">
                                        <i class="fal fa-fw fa-credit-card float-right mb-0"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-0">Total Rekening</h6>
                                </div>
                                <div class="card-body">
                                    <div class="border-bottom pb-4">
                                        <span class="ml-2 text-muted"> </span>
                                        <h5 class="m-0"><?= count($dataRekening); ?><i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
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