<?php include 'header.php'; ?>


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header center dancing-script font16">Registration</div>

            <div class="card-body ">
                <div class="container" style="text-align: center;">
                    <img style="width:25%;" src="<?php base_url() ?>/images/LogoProg.png">
                    <br>
                    <br>
                    <h3>Register New Account</h3><br>
                    <h6>Welcome to <br><br>
                        PROGRAMMING IN YOUR AREA</h6>
                </div>
                <br>

                <br>
                <form method="POST" action="/registration">


                    <div class="form-group row">
                        <label for="email"
                               class="col-sm-4 col-form-label text-md-right">Email Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control"
                                   name="email" required autofocus>

                        </div>
                    </div>
                    <br>

                    <div class="form-group row">
                        <label for="first_name"
                               class="col-sm-4 col-form-label text-md-right">Firstname</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text"
                                   class="form-control"
                                   name="first_name" required>

                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="last_name"
                               class="col-sm-4 col-form-label text-md-right">Lastname</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text"
                                   class="form-control"
                                   name="last_name" required>

                        </div>
                    </div>
                    <br>

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
                    <div class="form-group row">
                        <label for="confirm-password"
                               class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="confirm-password" type="password"
                                   class="form-control"
                                   name="confirm-password" required>


                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="divCheckPasswordMatch"
                               class="col-md-4 col-form-label text-md-right">Password Indicator</label>

                        <div class="alert alert-warning" id="divCheckPasswordMatch" name="divCheckPasswordMatch"
                             style="text-align: left;">
                            Waiting for
                            Password input
                        </div>


                    </div>
                    <br>
                    <div class="form-group row mb-0 ">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" id="regsbutton" class="btn btn-primary">
                                Register
                            </button>

                            <button class="btn btn-danger" type="reset">
                                Reset
                            </button>
                        </div>
                    </div>
            </div>


            </form>

        </div>
        <br>
        <br><br>
    </div>
</div>
</div>
<script>
    document.getElementById("regsbutton").disabled = true;

    function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#confirm-password").val();
        if (password.length < 6) {
            $("#divCheckPasswordMatch").html("Passwords at lease 6 character Register Locked");
            document.getElementById("divCheckPasswordMatch").className = "alert alert-warning";
            document.getElementById("regsbutton").disabled = true;
        }
        else if (password != confirmPassword) {
            $("#divCheckPasswordMatch").html("Passwords do not match! Register Locked");
            document.getElementById("divCheckPasswordMatch").className = "alert alert-danger";
            document.getElementById("regsbutton").disabled = true;
        }
        else {
            $("#divCheckPasswordMatch").html("Passwords match. Register Unlocked");
            document.getElementById("divCheckPasswordMatch").className = "alert alert-success";
            document.getElementById("regsbutton").disabled = false;
            document.getElementById("regsbutton").className = "btn btn-success";
        }
    }

    jQuery(document).ready(function () {
        $("#password, #confirm-password").keyup(checkPasswordMatch);
    });
</script>

<?php include 'footer.php'; ?>



