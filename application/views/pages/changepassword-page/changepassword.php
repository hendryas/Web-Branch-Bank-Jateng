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

                                <h4 class="text-muted text-center font-18"><b>Change Password</b></h4>

                                <div class="p-3">
                                    <form method="POST" action="<?= base_url('forgotpassword/changepassword'); ?>">

                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Silahkan ubah password baru anda!
                                        </div>

                                        <div class="form-group row">
                                            <label for="password1">Password</label>
                                            <div class="col-12">
                                                <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
                                            </div>
                                            <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password2">Repeat Password</label>
                                            <div class="col-12">
                                                <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat Password">
                                            </div>
                                            <small class="text-danger"><?php echo form_error('password2'); ?></small>
                                        </div>

                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Change</button>
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