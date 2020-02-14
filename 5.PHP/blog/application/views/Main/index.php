<header class="masthead" style="background-image: url('/public/images/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>PHP Blog</h1>
                    <span class="subheading">Простой блог на PHP - MVC</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (empty($posts)): ?>
                <p>Список постов пуст</p>
            <?php else: ?>
                <?php foreach ($posts as $val): ?>
                    <div class="post-preview">
                        <a href="/main/post/?id=<?php echo $val['id']; ?>">
                            <h2 class="post-title"><?php echo $val['title']; ?></h2>
                            <h5 class="post-subtitle"><?php echo $val['description']; ?></h5>
                        </a>
                        <p class="post-meta">Идентификатор этого поста <?php echo $val['id']; ?></p>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="clearfix">
                    <?php echo $pagination; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>