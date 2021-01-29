<div class="row justify-content-center">
    <h2 class="h5 text-muted mb-3 text-center">Добавить страну</h2>
    <div class="col-6 p-4 shadow ">
        <form action=""  method="post" class="bg-white p-3 border rounded">
            <div class="form-row">
                <div class="form-group col-8">
                    <label class="text-muted small" for="name">Название</label>
                    <input type="text" class="form-control" name="country[name]" id="country-name"
                           value="<?= htmlspecialchars($newCountry['name'] ?? '')?>" required>
                    <?php  if (isset($errors['name'])) :?>
                        <label class="text-danger small"><?= implode('<br>', $errors['name']) ?></label>
                    <?php endif ?>
                </div>
                <div class="form-group col-8">
                    <label class="text-muted small" for="capital">Столица</label>
                    <input type="text" class="form-control" name="country[capital]" id="country-capital"
                           value ="<?= htmlspecialchars($newCountry['capital'] ?? '')?>" required>
                    <?php  if (isset($errors['capital'])) :?>
                        <label class="text-danger small"><?= implode('<br>', $errors['capital']) ?></label>
                    <?php endif ?>
                </div>
                <div class="form-group col-8">
                    <label class="text-muted small" for="owner">Площадь</label>
                    <input type="number" class="form-control" name="country[area]" id="country-area"
                           value="<?= htmlspecialchars($newCountry['area'] ?? '')?>" required>
                    <?php  if (isset($errors['area'])) :?>
                        <label class="text-danger small"><?= implode('<br>', $errors['area']) ?></label>
                    <?php endif ?>
                </div>
                <div class="form-row mt-3 text-right">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-success" name="addCountry">Добавить</button>
                        <a href="index.php" class="btn btn-primary">Список стран</a>
                    </div>
                </div>
        </form>
    </div>
</div>
