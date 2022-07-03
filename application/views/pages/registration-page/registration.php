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
                                    <a href="index.html" class="logo logo-admin"><img src="assets/images/logos/icon-logo-bank-jateng.png" height="130" alt="logo"></a>
                                </h3>

                                <h4 class="text-muted text-center font-18"><b>Register</b></h4>

                                <div class="p-3">
                                    <form action="<?= base_url('auth/register_csr') ?>" method="POST">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= set_value('name'); ?>" required>
                                                <small class="text-danger"><?php echo form_error('name'); ?></small>
                                                <small>Tulis nama lengkap</small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>" required>
                                                <small class="text-danger"><?php echo form_error('username'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" required>
                                                <small class="text-danger"><?php echo form_error('email'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password1" placeholder="Password" required>
                                                <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                                <small>Panjang password minimal 4 karakter</small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="cpassword">Confirm Password</label>
                                                <input type="password" class="form-control" id="cpassword" name="password2" placeholder="Confirm Password" required>
                                                <small class="text-danger"><?php echo form_error('password2'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                                            </div>
                                        </div>

                                        <div class="form-group m-t-10 mb-0 row">
                                            <div class="col-12 m-t-20 text-center">
                                                <a href="<?= base_url('login'); ?>" class="text-muted">Already have account?</a>
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