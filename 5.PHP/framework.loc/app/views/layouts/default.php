<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $meta['title'] ?></title>
    <meta name="description" content="<?= $meta['desc'] ?>">
    <meta name="keywords" content="<?= $meta['keywords'] ?>">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <?php if (!empty($menu)): ?>
        <ul class="nav nav-pills">
            <?php foreach ($menu as $item): ?>
                <li class="nav-item">
                    <a class="nav-link" href="category/<?= $item['id'] ?>"><?= $item['title'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<div class="cantainer">
    <h1>DEFAULT</h1>

    <?= $content ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>