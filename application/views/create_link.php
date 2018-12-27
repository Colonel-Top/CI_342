<?php include 'header.php'; ?>

/**
 * Created by PhpStorm.
 * User: auttapholthongvichit
 * Date: 26/12/2018 AD
 * Time: 20:09
 */
    <div class="row">
        <div class="col-md-7 center">
            <div class="card">
                <div class="card-header">
                    Lastest Video Streaming
                </div>
                <div class="card-body">
                    <!--                autoplay=1&rel=0-->
                    <iframe width="100%" height="450px" src="https://www.youtube.com/embed/_7TMluHVx4Y?"
                            allow='autoplay' frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <iframe src="https://titanembeds.com/embed/356470862079197190" height="500px" width="100%"
                            frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <img class="center" src="<?php base_url() ?>/images/logolive.png" style="width:100%;">
    </div>
    <br>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Administrator Quick Tools
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                New Category
                            </div>
                            <div class="card-body">
                                <div class="center">
                                    <form method="POST" action="/category/add">
                                        <div class="form-group row justify-content-center">

                                            <div class="col-md-5">

                                                <input id="name" type="text"
                                                       class="form-control"
                                                       name="name" required>

                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Search User Email
                            </div>
                            <div class="card-body">
                                <div class="center">
                                    <form method="POST" action="/search/email">
                                        <div class="form-group row justify-content-center">

                                            <div class="col-md-5">

                                                <input id="email" type="email"
                                                       class="form-control"
                                                       name="email" required>

                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary">Search Email</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <br>

<?php include 'footer.php'; ?>