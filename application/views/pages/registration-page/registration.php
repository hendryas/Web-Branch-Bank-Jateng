<div class="alpha-app">
    <div class="container">
        <div class="login-container">
            <div class="row justify-content-center row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card login-box">
                        <div class="card-body">
                            <h5 class="card-title">Sign Up</h5>
                            <form action="">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password">
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