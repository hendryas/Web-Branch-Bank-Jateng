<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?= $title; ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/icons.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div class="accountbg">

        <div class="content-center">
            <div class="content-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8">
                            <div class="card">
                                <div class="card-block">

                                    <div class="ex-page-content text-center">
                                        <h1 class="text-primary">4<i class="fa fa-smile-o text-warning ml-1 mr-1"></i>4!</h1>
                                        <h3 class="">Sorry, page not found</h3><br>
                                        <?php if ($this->session->userdata('role_id') == 1) : ?>
                                            <a class="btn btn-primary mb-5 waves-effect waves-light" href="<?= base_url('dashboard_super_admin'); ?>">Back to Dashboard</a>
                                        <?php elseif ($this->session->userdata('role_id') == 2) : ?>
                                            <a class="btn btn-primary mb-5 waves-effect waves-light" href="<?= base_url('dashboard_admin'); ?>">Back to Dashboard</a>
                                        <?php elseif ($this->session->userdata('role_id') == 3) : ?>
                                            <a class="btn btn-primary mb-5 waves-effect waves-light" href="<?= base_url('dashboard_csr'); ?>">Back to Dashboard</a>
                                        <?php endif; ?>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery  -->
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/modernizr.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/detect.js'); ?>"></script>
    <script src="<?= base_url('assets/js/fastclick.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.slimscroll.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.blockUI.js'); ?>"></script>
    <script src="<?= base_url('assets/js/waves.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.nicescroll.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/js/app.js'); ?>"></script>

</body>

</html>