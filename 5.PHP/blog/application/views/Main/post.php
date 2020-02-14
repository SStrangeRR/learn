<header class="masthead" style="background-image: url('/public/images/posts/<?php echo $post['image']; ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1><?php echo $post['title']; ?></h1>
                    <span class="subheading"><?php echo $post['description']; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p><?php echo $post['text']; ?></p>
        </div>
    </div>
</div>