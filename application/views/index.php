<?php include 'header.php'; ?>


<div class="row">
    <div class="col-md-7 center">
        <div class="card">
            <div class="card-header">
                Lastest Video Streaming
            </div>
            <div class="card-body">
                <!--                autoplay=1&rel=0-->
                <iframe width="100%" height="450px" src="<?php
                $livestreamer['url'] = (is_null($livestreamer['url']) or empty($livestreamer['url'])) ? "https://www.youtube.com/watch?v=OX0RgKwbkdM" : $livestreamer['url'];
                $printer = str_replace('watch?v=', 'embed/', $livestreamer['url']) . "?autoplay=1&rel=0";
                echo($printer); ?>"

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
<!--<div class="col-md-6">-->
<!--    <div class="card">-->
<!--        <div class="card-header">-->
<!--            Search User Email-->
<!--        </div>-->
<!--        <div class="card-body">-->
<!--            <div class="center">-->
<!--                <form method="POST" action="/search/email">-->
<!--                    <div class="form-group row justify-content-center">-->
<!---->
<!--                        <div class="col-md-5">-->
<!---->
<!--                            <input id="email" type="email"-->
<!--                                   class="form-control"-->
<!--                                   name="email" required>-->
<!---->
<!--                        </div>-->
<!--                        <div class="col-md-3">-->
<!--                            <button type="submit" class="btn btn-primary">Search Email</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<?php if ((($this->user->findOrFail($this->session->logged)))[0]['role'] == "admin")
{

    echo('<div class="container">
    <div class="card">
        <div class="card-header">
            Administrator Quick Tools
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header">
                            New Category
                        </div>
                        <div class="card-body">
                            <div class="center">
                                <form method="POST" action="/category/add">
                                    <div class="form-group row justify-content-center">

                                        <div class="col-md">

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
               
            </div>

        </div>
    </div>
</div>
');
    };
?>
<br>
<br>
<?php if (!$this->session->logged)
{
    echo('<div class = "container">');
    echo('<div class = "card center"> ');
    echo('<div class = "card-header">');
    echo('Notice to join our Community !');
    echo('</div>');
    echo('<div class = "card-body">');
    echo("<h3>Please Login to Post/Comment/Broadcast in our Community </h3>");
    echo('<br>');
    echo('<a class = "btn btn-primary" href = "');
    echo(base_url());
    echo('/login">Login</a>');
    echo('<br>');
    echo('<br>');
    echo('<br>');
    echo("<h3>Or Register if you not have account yet! </h3>");
    echo('<br>');
    echo('<a class = "btn btn-success" href = "');
    echo(base_url());
    echo('/register">Register</a>');
    echo('<br>');
    echo('<br>');
    echo('</div>');


    echo('</div>');
    echo('<br>');
//
//    echo('<div class="container-fluid">');
//    echo('<img class="center" src="');
//    echo(base_url());
//    echo('/images/logolive.png" style="width:100%;">');
//    echo('</div>');
//    echo('</div>');

    echo('<br>');
    echo('<br>');
    echo('<br>');
    echo('</div>');

}
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md">
                    Live Streaming
                </div>
                <div class="col-md" style="text-align: right;">
                    <a href="<?php base_url() ?>livestream/create" class="btn btn-primary" style="color: pink"><i
                                class="fas fa-video"></i>&nbsp;Create new
                        Streaming</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php
            if (!empty($livestream))
            {
                foreach ($livestream as $item)
                {
                    $name = $item['name'];

                    echo('
            <table class="table table-striped task-table">
                <!-- Table Headings -->
                <thead>
                <tr>
                    <th width="60%">Livestream Name</th>
                   
                 
                      <th width="40%">Created By</th>
    
                

                </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                ');


                    echo('
                <tr>


                    <td class="table-text">
                       ');
                    $value = strpos($item['name'], '?', 0);

                    echo("<a class='btn btn-basic' href = \"");
                    echo(base_url() . "livestream/" . $item['id']);
                    echo("\"  " . "><p>" . "<i class=\"far fa-lightbulb\"></i>&nbsp;&nbsp;&nbsp;&nbsp;" . ($value ? "[QUESTION] " : "") . $item['name'] . '</p>' . '</a>' . '<p>' . '&nbsp;&nbsp;&nbsp;&nbsp;' . (substr($item['description'], 0, 30)) . '</p>');
                    echo('
                    </td>
                
                    <td class="table-text">
                     ');
//                    print_r($this->user->findOrFail($item['users_id']));
                    echo("<h6>" . ($this->user->findOrFail($item['users_id']))[0]['first_name'] . '</h6>' . '<p>' . ($item['timestamp']) . '</p>');
                    echo('
                    </td>
                    
                    ');

                    echo('
                  

                </tr>
             ');

                    echo('
                </tbody>
            </table>
            ');
                    echo('<br>');
                    echo('<hr>');
                    echo('<br>');

                }
            }
            else
                echo("There's no Live-streaming currently"); ?>
        </div>
    </div>
    <br>
    <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md">
                    Post & Discussion
                </div>

                <div class="col-md" style="text-align: right;">
                    <a href="<?php base_url() ?>post/create" class="btn btn-primary" style="color: pink"><i
                                class="fas fa-video"></i>&nbsp;Create new Post</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <?php foreach ($categories as $cat)
            {
                $name = $cat['name'];
                $id = $cat['id'];

                if ($this->user->isAdmin())
                {
                    echo('   <form method="POST" action="/categories/update">');
                        echo('<input id="name" type="text"
                                   style="text-align:left;"
                                   name="name" required  value="'.$name.'">');

                    echo('<input id="id" type="hidden" name="id" required value="'.$id.'">');

                    echo("<button type='submit' class=\"btn btn-basic\">");
                    echo('<i class="fas fa-check-circle"></i></button>');

                    echo("<a class=\"btn btn-basic\" href=\"categories/delete/$id\"");
                    echo('><i class="fas fa-ban"></i></a>');
                    echo("</form>");

                }
                else
                {
                    echo("<h3>$name Forum:".'');
                    echo("</h3>");

                }
                ?>

                <?php
                if ($this->post->countByLanguage($cat['id']) == 0)
                {
                    echo("<hr>");

                    echo("<h6>No Post for this Language</h6>");
                    echo("<br>");
                    continue;
                }
                echo('
            <table class="table table-striped task-table">
                <!-- Table Headings -->
                <thead>
                <tr>
                    <th width="60%">Forum Name</th>
                   
                    <th width="10%">Comment</th>
                      <th width="10%">Created By</th>
                    <th width="10%">Last Reply</th>
                

                </tr>
                </thead>

                <!-- Table Body -->
                <tbody>
                ');


                foreach ($this->post->getLanguagePost($cat['id']) as $item)
                {
                    echo('
                <tr>


                    <td class="table-text">
                       ');
                    $value = strpos($item['name'], '?', 0);

                    echo("<a class='btn btn-basic' href = \"");
                    echo(base_url() . "post/" . $item['id']);
                    echo("\"  " . "><p>" . "<i class=\"far fa-lightbulb\"></i>&nbsp;&nbsp;&nbsp;&nbsp;" . ($value ? "[QUESTION] " : "") . $item['name'] . '</p>' . '</a>' . '<p>' . '&nbsp;&nbsp;&nbsp;&nbsp;' . (substr($item['description'], 0, 30)) . '</p>');
                    echo('
                    </td>
                    <td class="table-text center">
                      ');
                    echo($this->comment->countCommentFromPostID($item['id']));
                    echo('
                    </td>
                    <td class="table-text">
                     ');
//                    print_r($this->user->findOrFail($item['users_id']));
                    echo("<h6>" . ($this->user->findOrFail($item['users_id']))[0]['first_name'] . '</h6>' . '<p>' . ($item['timestamp']) . '</p>');
                    echo('
                    </td>
                    
                    ');
                    echo('
                    <td class="table-text">
                    ');
                    $lastcom = $this->comment->getLastCommentFromPostID($item['id']);
                    $name = "-";
                    if (!(empty($lastcom) or is_null($lastcom)))
                        $name = ($this->user->findOrFail($lastcom['users_id']))[0]['first_name'];


                    $timer = $lastcom['timestamp'];

                    echo("$name<br> $timer ");
                    echo('</td>');
                    echo('
                  

                </tr>
             ');
                }
                echo('
                </tbody>
            </table>
            ');
                echo('<br>');
                echo('<hr>');
                echo('<br>');

            } ?>

        </div>
    </div>
    <br>
    <br>

</div>
<?php include 'footer.php'; ?>




