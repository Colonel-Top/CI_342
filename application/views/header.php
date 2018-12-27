<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <title>Programming In your Area ~</title>


    <!-- Scripts -->


    <!--    <link href=--><?php //echo base_url(); ?><!--css/app.css" rel="stylesheet">-->
    <!-- Bootstrap -->


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!-- Scripts -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="" rel="stylesheet">
    <!--    <script src="--><?php //base_url() ?><!--js/jquery-2.2.4.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>

<body style="background-color:#f6cdd5;">
<div class = "container-fluid">
    <a class="center" href="<?php echo(base_url());?>"><img src="<?php base_url() ?>/images/cover.jpg" style=" width:100%;'"></a>
</div>
<div class="container-fluid">
    <?php include 'css.php'; ?>

    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #f4a7b7;">
        <?php include 'menubar.php'; ?>
    </nav>
</div>
<br>
<br>
<div class="container-fluid">
    <?php
    if (!is_null($this->session->userdata("error")))
    {
        echo("<div class = \"alert alert-warning\">");
        echo($this->session->userdata("error"));
        echo("</div>");
    }
    if (!is_null($this->session->userdata("successful")))
    {
        echo("<div class = \"alert alert-success\">");
        echo($this->session->userdata("successful"));
        echo("</div>");
    }
    ?>


