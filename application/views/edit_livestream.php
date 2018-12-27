<?php include 'header.php'; ?>


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header center dancing-script font16">EDIT LIVE STREAMING</div>

            <div class="card-body ">

                <div class="container" style="text-align: center;">
                    <img style="width:25%;" src="<?php base_url() ?>/images/LogoProg.png">
                    <br>
                    <br>
                    <h3>Create new live streaming</h3>
                    <h6>All Fields Required</h6>

                </div>

                <br>
                <form method="POST" action="/livestream/update">


                    <div class="form-group row">
                        <label for="email"
                               class="col-sm-2 col-form-label text-md-right">LiveStreaming Name</label>

                        <div class="col-md-9">
                            <input id="users_id" type="hidden"
                                   class="form-control"
                                   name="users_id" value="<?php echo($this->session->logged); ?>">
                            <input id="name" type="text"
                                   class="form-control"
                                   name="name" required autofocus value="<?php echo($livestream['name']);?>">

                        </div>

                    </div>


                    <br>
                    <div class="form-group row">
                        <label for="description"
                               class="col-sm-2 col-form-label text-md-right">description</label>

                        <div class="col-md-9">

                            <textarea name="description" id="description" style="width:100%; min-height:100px;"
                                      required><?php echo($livestream['description']);?></textarea>

                        </div>

                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="url"
                               class="col-sm-2 col-form-label text-md-right">URL:</label>


                        <div class="col-md-9">
                            <input id="id" type="hidden"
                            class="form-control"
                            name="id" required autofocus value="<?php echo($livestream['id']);?>">
                            <input id="url" type="url"
                                   class="form-control"
                                   name="url" required autofocus value="<?php echo($livestream['url']);?>">
                        </div>
                    </div>
                    <br>


                    <br>
                    <div class="form-group row mb-0 ">
                        <div class="col-md-10 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Update Livestreaming
                            </button>
                            <button type="reset" class="btn btn-warning">
                                Reset
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".inputs");
        var add_button = $(".add_form_field");

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div><input type="text" name="language[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
            }
            else {
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click", ".delete", function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
</script>

<?php include 'footer.php'; ?>



