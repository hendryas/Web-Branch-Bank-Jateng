<div class="alpha-app">
    <div class="container">

        <?php echo $this->session->flashdata('message'); ?>

        <div class="login-container">
            <div class="row justify-content-center row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card login-box">
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible text-white">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Silahkan ubah password baru anda!
                            </div>

                            <h5 class="card-title mt-3">Forgot Password</h5>
                            <form method="POST" action="<?= base_url('forgotpassword/changepassword'); ?>">
                                <div class="form-group">
                                    <label for="password1">Password</label>
                                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
                                    <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Repeat Password</label>
                                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat Password">
                                    <small class="text-danger"><?php echo form_error('password2'); ?></small>
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Ubah Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>