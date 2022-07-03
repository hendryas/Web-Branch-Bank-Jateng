<!-- Begin page -->
<div class="accountbg">

    <div class="content-center">
        <div class="content-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="text-center mt-0 m-b-15">
                                    <a href="#" class="logo logo-admin"><img src="assets/images/logos/icon-logo-bank-jateng.png" height="130" alt="logo"></a>
                                </h3>

                                <h4 class="text-muted text-center font-18"><b>Reset Password</b></h4>

                                <div class="p-3">
                                    <form method="POST" action="<?= base_url('forgotpassword'); ?>">

                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Masukkan <b>Email</b> Anda dan instruksi akan dikirimkan kepada Anda!
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                                                <small class="text-danger"><?php echo form_error('email'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Send Email</button>
                                            </div>
                                        </div>

                                    </form>
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