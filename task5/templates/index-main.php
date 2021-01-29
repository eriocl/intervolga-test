<?php if (isset($flash)) : ?>
    <div class = "row bg-info">
        <?= $flash ?>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-9">
        <h1 class="text-center">Тестовое задание №5</h1>
        <table class="table table-borderless table-dark table-hover table-striped">
            <thead>
            <tr>
                <th class="col-3">Название страны</th>
                <th class="col-3">Столица</th>
                <th class="col-3">Занимаемая площадь</th>
                <th class="col-3">Время создания</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($countries as $country) : ?>
                <tr>
                    <td><?= htmlspecialchars($country['name']) ?></td>
                    <td><?= htmlspecialchars($country['capital']) ?></td>
                    <td><?= htmlspecialchars($country['area']) ?></td>
                    <td><?= htmlspecialchars($country['created_at']) ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<a href="create.php" class="btn btn-success">Добавить страну</a>