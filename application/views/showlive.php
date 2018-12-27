<?php include 'header.php'; ?>
<div class="container">
    <h3><?php echo($livestream['name']); ?> Live Streaming</h3>

    <br>

    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6><?php echo($livestream['timestamp']); ?></h6>
                </div>
                <div class="card-body" style="min-height: 300px;">

                    <h5><?php echo(($this->user->findOrFail($livestream['users_id']))[0]['first_name'] . "&nbsp;&nbsp;" . ($this->user->findOrFail($livestream['users_id']))[0]['last_name']); ?></h5>
                    <br>
                    <h6>Join date: <?php echo ($this->user->findOrFail($livestream['users_id']))[0]['timestamp']; ?></h6>
                    <br>
                    <br>
                    <p>Total Post: <?php echo($this->post->countUserPost($livestream['users_id'])); ?></p>
                    <p>Total
                        Comment: <?php echo($this->post->countUserComment($livestream['users_id']) == null ? "0" : $this->post->countUserComment($livestream['users_id'])); ?></p>
                    <p>Total
                        Livestream: <?php echo($this->post->countUserLive($livestream['users_id']) == null ? "0" : $this->post->countUserLive($livestream['users_id'])); ?></p>


                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md" style="text-align: left;">
                            <?php $value = strpos($livestream['name'], '?', 0);
                            echo(($value ? "[QUESTION] " : "") . $livestream['name']); ?>
                        </div>
                        <div class="col-md" style="text-align: right;">
                            <?php if (!is_null($this->session->logged) and $this->session->logged == $livestream['users_id'])
                            {
                                $id = $livestream['id'];
                                echo("<a href='");
                                echo(base_url());
                                echo("livestream/edit/$id"); ?>

                                <?php echo("' class='btn btn-primary'
                            style='background-color: whitesmoke;color:hotpink'>
                            <i class='fas fa-scroll' style='color:deeppink;'></i>&nbsp;Edit
                            </a>
                            ");
                                echo("<a href='" . base_url() . "livestream/delete/$id"); ?>


                                <?php echo("' class='btn btn-primary'
                            style='background-color: whitesmoke;color:hotpink'>
                            <i class='fas fa-trash-alt' style='color:deeppink;'></i>&nbsp;Delete
                            </a> ");
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height: 300px;">

                    <iframe width="100%" height="450px" src=" <?php echo(str_replace('watch?v=','embed/',$livestream['url'])."?autoplay=1&rel=0"); ?>"
                                                            allow='autoplay' frameborder="0"
                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                    <?php echo($livestream['description']); ?>
                </div>
            </div>
            <br>


        </div>
    </div>
    <HR>
<!--    --><?php //if (!empty($results)) { ?>
<!--        --><?php //foreach ($results as $item) { ?>
<!--            <div class="row justify-content-center">-->
<!--                <div class="col-md-3">-->
<!--                    <div class="card">-->
<!--                        <div class="card-header">-->
<!--                            <h6>--><?php //echo($item['timestamp']); ?><!--</h6>-->
<!--                        </div>-->
<!--                        <div class="card-body" style="min-height: 300px;">-->
<!--                            <h5>--><?php //echo(($this->user->findOrFail($livestream['users_id']))[0]['first_name'] . "&nbsp;&nbsp;" . ($this->user->findOrFail($livestream['users_id']))[0]['last_name']); ?><!--</h5>-->
<!--                            <br>-->
<!--                            <h6>Join-->
<!--                                date: --><?php //echo ($this->user->findOrFail($livestream['users_id']))[0]['timestamp']; ?><!--</h6>-->
<!--                            <br>-->
<!--                            <br>-->
<!--                            <p>Total Post: --><?php //echo($this->post->countUserPost($livestream['users_id'])); ?><!--</p>-->
<!--                            <p>Total-->
<!--                                Comment: --><?php //echo($this->post->countUserComment($livestream['users_id']) == null ? "0" : $this->post->countUserComment($livestream['users_id'])); ?><!--</p>-->
<!--                            <p>Total-->
<!--                                Livestream: --><?php //echo($this->post->countUserLive($livestream['users_id']) == null ? "0" : $this->post->countUserLive($livestream['users_id'])); ?><!--</p>-->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-9">-->
<!--                    <div class="card">-->
<!--                        <div class="card-header">-->
<!--                            <div class="row">-->
<!--                                <div class="col-md" style="text-align: left;">-->
<!--                                    --><?php //echo($item['name']); ?>
<!--                                </div>-->
<!--                                <div class="col-md" style="text-align: right;">-->
<!--                                    --><?php //if ((!is_null($this->session->logged) and $this->session->logged == $item['users_id']) or ($this->user->findOrFail($this->session->logged)[0]['role']=="admin"))
//                                    {
//                                        $id = $item['id'];
//                                        echo("<a href='comment/edit/$id"); ?>
<!---->
<!--                                        --><?php //echo("' class='btn btn-primary'
//                            style='background-color: whitesmoke;color:hotpink'>
//                            <i class='fas fa-scroll' style='color:deeppink;'></i>&nbsp;Edit
//                            </a>
//                            ");
//                                        echo("<a href='comment/delete/$id"); ?>
<!---->
<!---->
<!--                                        --><?php //echo("' class='btn btn-primary'
//                            style='background-color: whitesmoke;color:hotpink'>
//                            <i class='fas fa-trash-alt' style='color:deeppink;'></i>&nbsp;Delete
//                            </a> ");
//                                    } ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="card-body" style="min-height: 300px;">-->
<!--                            <iframe width="100%" height="450px" src="--><?php //echo($item['description']); ?><!--"-->
<!--                                    allow='autoplay' frameborder="0"-->
<!--                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"-->
<!--                                    allowfullscreen></iframe>-->
<!--                            -->
<!--                            --><?php //echo($item['description']); ?>
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        --><?php //}
//    } ?>




</div>
<?php include 'footer.php'; ?>
