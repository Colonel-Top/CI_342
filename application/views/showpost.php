<?php include 'header.php'; ?>
<div class="container">
    <h3><?php echo(($this->post->getLanguage($post['language']))['name']); ?> Category</h3>

    <br>

    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6><?php echo($post['timestamp']); ?></h6>
                </div>
                <div class="card-body" style="min-height: 300px;">

                    <h5><?php echo(($this->user->findOrFail($post['users_id']))[0]['first_name'] . "&nbsp;&nbsp;" . ($this->user->findOrFail($post['users_id']))[0]['last_name']); ?></h5>
                    <br>
                    <h6>Join date: <?php echo ($this->user->findOrFail($post['users_id']))[0]['timestamp']; ?></h6>
                    <br>
                    <br>
                    <p>Total Post: <?php echo($this->post->countUserPost($post['users_id'])); ?></p>
                    <p>Total
                        Comment: <?php echo($this->post->countUserComment($post['users_id']) == null ? "0" : $this->post->countUserComment($post['users_id'])); ?></p>
                    <p>Total
                        Livestream: <?php echo($this->post->countUserLive($post['users_id']) == null ? "0" : $this->post->countUserLive($post['users_id'])); ?></p>


                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md" style="text-align: left;">
                            <?php $value = strpos($post['name'], '?', 0);
                            echo(($value ? "[QUESTION] " : "") . $post['name']); ?>
                        </div>
                        <div class="col-md" style="text-align: right;">
                            <?php if (!is_null($this->session->logged) and $this->session->logged == $post['users_id'])
                            {
                                $id = $post['id'];
                                echo("<a href='");
                                echo(base_url());
                                echo("post/edit/$id"); ?>

                                <?php echo("' class='btn btn-primary'
                            style='background-color: whitesmoke;color:hotpink'>
                            <i class='fas fa-scroll' style='color:deeppink;'></i>&nbsp;Edit
                            </a>
                            ");
                                echo("<a href='" . base_url() . "post/delete/$id"); ?>


                                <?php echo("' class='btn btn-primary'
                            style='background-color: whitesmoke;color:hotpink'>
                            <i class='fas fa-trash-alt' style='color:deeppink;'></i>&nbsp;Delete
                            </a> ");
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height: 300px;">
                    <?php echo($post['description']); ?>
                    <?php if(!empty($post['url']))
                    {
                        $post['url'] = preg_split("[;]",$post['url']);
                        echo('<br><br><div class = "row">');
                        foreach($post['url'] as $it)
                        {

                            echo('<div class = "col-md">');
                            echo('<img src="');
                            echo($it);
                            echo('" height="auto;" width="100%">');
                            echo("</div>");

                        }
                        echo("</div>");
                    }?>
                </div>
            </div>
            <br>
            <?php if ($this->user->Auth()) { ?>
                <div style="text-align: right;">


                    <a id="button" href="#" class="btn btn-primary"
                       style="color:pink; background-color: black;">Reply</a>
                    <a class="btn btn-primary" style="color:pink; background-color: black;"
                       href="mailto:promsurinm@hotmail.com?subject=Report Post Link By <?php echo(($this->user->findOrFail($post['users_id']))[0]['first_name'] . "&nbsp;" . ($this->user->findOrFail($post['users_id']))[0]['last_name']); ?> &amp;body=Abuse Comment <?php echo base_url(uri_string()); ?> by following details: <?php echo($post['description'] . "\n"); ?>">Report</a>

                </div>
                <br>
            <?php } ?>

        </div>
    </div>
    <HR>
    <?php if (!empty($results)) { ?>
        <?php foreach ($results as $item) { ?>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h6><?php echo($item['timestamp']); ?></h6>
                        </div>
                        <div class="card-body" style="min-height: 300px;">
                            <h5><?php echo(($this->user->findOrFail($item['users_id']))[0]['first_name'] . "&nbsp;" . ($this->user->findOrFail($item['users_id']))[0]['last_name']); ?></h5>
                            <br>
                            <h6>Join
                                date: <?php echo ($this->user->findOrFail($item['users_id']))[0]['timestamp']; ?></h6>
                            <br>
                            <br>
                            <p>Total Post: <?php echo($this->post->countUserPost($item['users_id'])); ?></p>
                            <p>Total
                                Comment: <?php echo($this->post->countUserComment($item['users_id']) == null ? "0" : $this->post->countUserComment($item['users_id'])); ?></p>
                            <p>Total
                                Livestream: <?php echo($this->post->countUserLive($item['users_id']) == null ? "0" : $this->post->countUserLive($item['users_id'])); ?></p>


                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md" style="text-align: left;">
                                    <?php echo($item['name']); ?>
                                </div>
                                <div class="col-md" style="text-align: right;">
                                    <?php if ((!is_null($this->session->logged) and $this->session->logged == $item['users_id']) or ($this->user->findOrFail($this->session->logged)[0]['role']=="admin"))
                                    {
                                        $id = $item['id'];
                                        echo("<a href='");
                                        echo(base_url());
                                        echo("comment/edit/$id"); ?>

                                        <?php echo("' class='btn btn-primary'
                            style='background-color: whitesmoke;color:hotpink'>
                            <i class='fas fa-scroll' style='color:deeppink;'></i>&nbsp;Edit
                            </a>
                            ");
                                        echo("<a href='");
                                        echo(base_url());
                                        echo("comment/delete/$id"); ?>


                                        <?php echo("' class='btn btn-primary'
                            style='background-color: whitesmoke;color:hotpink'>
                            <i class='fas fa-trash-alt' style='color:deeppink;'></i>&nbsp;Delete
                            </a> ");
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="min-height: 300px;">
                            <?php echo($item['description']); ?>
                            <?php if(!empty($item['type']))
                                {
                                    $item['type'] = preg_split("[;]",$item['type']);
                                    echo('<br><br><div class = "row">');
                                   foreach($item['type'] as $it)
                                   {

                                       echo('<div class = "col-md">');
                                       echo('<img src="');
                                       echo($it);
                                       echo('" height="auto;" width="100%">');
                                       echo("</div>");

                                   }
                                    echo("</div>");
                                }?>
                        </div>

                    </div>
                    <br>
                    <?php if ($this->user->Auth()) { ?>
                        <div style="text-align: right; ">


<!--                            <a href="#" class="btn btn-primary"-->
<!--                               style="color:pink; background-color: black;">Reply</a>-->
                            <a class="btn btn-primary" style="color:pink; background-color: black;"
                               href="mailto:promsurinm@hotmail.com?subject=Report Post Link By <?php echo(($this->user->findOrFail($item['users_id']))[0]['first_name'] . "&nbsp;" . ($this->user->findOrFail($item['users_id']))[0]['last_name']); ?> &amp;body=Abuse Comment <?php echo base_url(uri_string()); ?> by following details: <?php echo($item['description'] . "\n"); ?>">Report</a>


                        </div>
                        <br>
                    <?php } ?>
                </div>

            </div>
            <br>
            <br>
        <?php }
    } ?>


    <div class="row justify-content-center ">
        <div class="col-md-8">

            <div class="card-header center">
                Quick Reply
            </div>

            <div class="card-body">
                <form method="POST" action="/comment/add">

                    <div class="form-group row">
                        <label for="email"
                               class="col-sm-2 col-form-label text-md-right">Post Name</label>

                        <div class="col-md-9">
                            <input id="users_id" type="hidden"
                                   class="form-control"
                                   name="users_id" value="<?php echo($this->session->logged); ?>">
                            <input id="name" type="text"
                                   class="form-control"
                                   name="name" required value="RE: <?php echo($post['name']); ?>">
                            <input id="post_id" type="hidden"
                                   class="form-control"
                                   name="post_id" required value="<?php echo($post['id']); ?>">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="description"
                               class="col-sm-2 col-form-label text-md-right">Description</label>

                        <div class="col-md-9">

                            <textarea name="description" id="description" style="width:100%; min-height:150px;"
                                      required></textarea>

                        </div>

                    </div>
                    <div class="form-group row ">
                        <label for="type" class="col-md-4 col-form-label text-md-right">Picture</label>
                        <div class="col-md-6 ">

                            <div class="inputs" id="imagelist">
                                <button class="add_form_field">Add New URL &nbsp; <span
                                            style="font-size:16px; font-weight:bold;">+ </span></button>
                                <br>
                                <input type="text" name="type[]" class="field"
                                /></div>

                        </div>
                    </div>

                    <div class="form-group row mb-0 ">
                        <div class="col-md-10 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Quick Reply
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
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header center">
                    <?php
                    if (!empty($links) and is_null($links) and $links != "")
                        echo($links);

                    ?>
                </div>
            </div>
        </div>

    </div>
    <?php $this->session->set_userdata('referred_from', current_url()); ?>
    <?php echo("<br>"); ?>   <?php echo("<br>"); ?>
</div>
<script>
    $("#button").click(function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#name").offset().top
        }, 2000);
    });
</script>
<script>
    function addimages() {
        var x = document.getElementById('imagelist');
        var input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("name", "type[]");
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
                $(wrapper).append('<div><input type="text" name="type[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
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
