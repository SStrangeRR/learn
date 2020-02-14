<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Посты</div>
            <div class="card-body">
                <div class="row">

                        <?php if (empty($posts)): ?>
                            <p>Список постов пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>Заголовок</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <?php foreach ($posts as $val): ?>
                                    <tr>
                                        <td><?php echo $val['title']; ?></td>
                                        <td><a href="admin/edit/?id=<?php echo $val['id']; ?>"
                                               class="btn btn-primary btn-sm">Редактировать</a></td>
                                        <td><a href="admin/delete/?id=<?php echo $val['id']; ?>"
                                               class="btn btn-danger btn-sm">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php echo $pagination; ?>
                        <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>