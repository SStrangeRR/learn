<div class="container">
    <div id="answer"></div>
    <?php new \vendor\widgets\menu\Menu([
        'tmpl' => WWW . '/menu/select.php',
        'container' => 'select',
        'class' => 'test_menu',
        'table' => 'categories',
        'cache' => 60,
        'cacheKey' => 'menu_ul',
    ]); ?>
    <button class="btn btn-primary" id="send">Send</button>

    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="card">
                <div class="card-header">
                    <?= $post['title'] ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $post['text'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script src="/js/test.js"></script>
<script>
    $(function () {
        $('#send').click(function () {
            $.ajax({
                url: '/main/test',
                type: 'post',
                data: {'id': 2},
                success: function (res) {
                    $('#answer').html(res);
                },
                error: function () {
                    alert('Error!')
                }
            });
        });
    })
</script>