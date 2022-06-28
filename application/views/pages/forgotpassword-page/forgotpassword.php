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
                                Masukkan <b>Email</b> Anda dan instruksi akan dikirimkan kepada Anda!
                            </div>

                            <h5 class="card-title mt-3">Forgot Password</h5>
                            <form method="POST" action="<?= base_url('forgotpassword'); ?>">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                                    <small class="text-danger"><?php echo form_error('email'); ?></small>
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Send</button>
                                <a href="<?= base_url('login'); ?>" class="btn btn-text-secondary float-right m-r-sm">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>