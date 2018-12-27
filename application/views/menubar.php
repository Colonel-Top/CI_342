
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent" style="z-index: 1!important;">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php base_url() ?>/">Home </a>
        </li>



    </ul>
    <ul class="navbar-nav ml-auto">
        <?php if ($this->session->logged)
        {
            echo('<li class="nav-item" >');
            echo('<a class="nav-link" href = "');
            echo(base_url());
            echo('logout" > Logout</a >');
            echo('</li >');


        }
        else
        {

            echo('<li class="nav-item" >');
            echo('<a class="nav-link" href = "');
            echo(base_url());
            echo('register" > New Account</a >
        </li >
        <li class="nav-item" >

            <a class="nav-link" href = "');
            echo(base_url());
            echo('login" > Login</a >
        </li >');
        }

        ?>
    </ul>


</div>
