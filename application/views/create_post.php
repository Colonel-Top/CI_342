<?php include 'header.php'; ?>


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header center dancing-script font16">AUTHENTICATE ZONE</div>

            <div class="card-body ">
                <div class="container" style="text-align: center;">
                    <img style="width:25%;" src="<?php base_url() ?>/images/LogoProg.png">
                    <br>
                    <br>
                    <h3>Create new Post</h3>
                    <h6>All Fields Required</h6>

                </div>

                <br>
                <form method="POST" action="/post/addpost">


                    <div class="form-group row">
                        <label for="email"
                               class="col-sm-2 col-form-label text-md-right">Post Name</label>

                        <div class="col-md-9">
                            <input id="users_id" type="hidden"
                                   class="form-control"
                                   name="users_id" value="<?php echo($this->session->logged); ?>">
                            <input id="name" type="text"
                                   class="form-control"
                                   name="name" required autofocus>

                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="description"
                               class="col-sm-2 col-form-label text-md-right">Content</label>

                        <div class="col-md-9">

                            <textarea name="description" id="description" style="width:100%; min-height:350px;"
                                      required></textarea>

                        </div>

                    </div>


                    <br>


                    <div class="form-group row ">
                        <label for="language" class="col-md-4 col-form-label text-md-right">Language &nbsp; </label>
                        <div class="col-md-6 ">


                            <select name="language" class="form-control"  style="width:100%;">

                                <?php foreach ($categories as $g): ?>
                                    <option value="<?php echo($g['id']); ?>"> <?php echo($g['name']); ?></option>

                                <?php endforeach; ?>

                            </select>

                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="type" class="col-md-4 col-form-label text-md-right">Picture</label>
                        <div class="col-md-6 ">

                            <div class="inputs" id="imagelist">
                                <button class="add_form_field">Add New URL &nbsp; <span
                                            style="font-size:16px; font-weight:bold;">+ </span></button>
                                <br>
                                <input type="text" name="url[]" class="field"
                                /></div>

                        </div>
                    </div>

                    <br>
                    <div class="form-group row mb-0 ">
                        <div class="col-md-10 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Add Post
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

<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        var max_fields = 10;-->
<!--        var wrapper = $(".inputs");-->
<!--        var add_button = $(".add_form_field");-->
<!---->
<!--        var x = 1;-->
<!--        $(add_button).click(function (e) {-->
<!--            e.preventDefault();-->
<!--            if (x < max_fields) {-->
<!--                x++;-->
<!--                $(wrapper).append('<div><input type="text" name="language[]"/><a href="#" class="delete">Delete</a></div>'); //add input box-->
<!--            }-->
<!--            else {-->
<!--                alert('You Reached the limits')-->
<!--            }-->
<!--        });-->
<!---->
<!--        $(wrapper).on("click", ".delete", function (e) {-->
<!--            e.preventDefault();-->
<!--            $(this).parent('div').remove();-->
<!--            x--;-->
<!--        })-->
<!--    });-->
<!--</script>-->

<script>
    function addimages() {
        var x = document.getElementById('imagelist');
        var input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("name", "url[]");
        input.setAttribute("placeholder", "test");
        x.appendChild(input);

    }
</script>
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
                $(wrapper).append('<div><input type="text" name="url[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
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
<?php include 'footer.php'; ?>



