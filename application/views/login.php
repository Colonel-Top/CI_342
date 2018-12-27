<?php include 'header.php'; ?>


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header center dancing-script font16">AUTHENTICATE ZONE</div>

            <div class="card-body ">
                <div class="container" style="text-align: center;">
                    <img style="width:25%;" src="<?php base_url()?>/images/LogoProg.png">
                    <br>
                    <br>
                    <h3 >Authentication By your Credential</h3>
                    <h6>Hacking this access to this website is prohibited <br>
                        and violators will be prosecuted to the full extent of the law</h6>
                </div>

                <br>
                <form method="POST" action="/authorized">


                    <div class="form-group row">
                        <label for="email"
                               class="col-sm-4 col-form-label text-md-right">Email Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control"
                                   name="email"  required autofocus>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control"
                                   name="password" required>


                        </div>
                    </div>


                    <br>

                    <div class="form-group row mb-0 ">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-warning" href="/forgetpassword">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>



