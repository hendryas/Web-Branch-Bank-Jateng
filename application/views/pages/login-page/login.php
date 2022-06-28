<div class="alpha-app">
    <div class="container">

        <?php echo $this->session->flashdata('message'); ?>

        <div class="login-container">
            <div class="row justify-content-center row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card login-box">
                        <div class="card-body">
                            <h5 class="card-title">Sign In</h5>
                            <form action="<?= base_url('login'); ?>" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>" required>
                                    <small class="text-danger"><?php echo form_error('username'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <small class="text-danger"><?php echo form_error('password'); ?></small>
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Sign In</button>
                                <a href="<?= base_url('registration'); ?>" class="btn btn-text-secondary float-right m-r-sm">Sign Up</a>

                                <a href="<?= base_url('forgotpassword'); ?>" class="btn btn-text-secondary float-right m-r-sm mt-3">Forgot Password</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>