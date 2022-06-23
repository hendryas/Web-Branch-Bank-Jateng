<div class="alpha-app">
    <div class="container">
        <div class="login-container">
            <div class="row justify-content-center row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card login-box">
                        <div class="card-body">
                            <h5 class="card-title">Sign Up</h5>
                            <form action="<?= base_url('auth/register_csr') ?>" method="POST">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= set_value('name'); ?>" required>
                                    <small class="text-danger"><?php echo form_error('name'); ?></small>
                                    <small>Tulis nama lengkap</small>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>" required>
                                    <small class="text-danger"><?php echo form_error('username'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" required>
                                    <small class="text-danger"><?php echo form_error('email'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password1" placeholder="Password" required>
                                    <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                    <small>Panjang password minimal 4 karakter</small>
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="cpassword" name="password2" placeholder="Confirm Password" required>
                                    <small class="text-danger"><?php echo form_error('password2'); ?></small>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Sign Up</button>
                                <a href="<?= base_url('login') ?>" class="btn btn-text-secondary float-right m-r-sm">Sign In</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>