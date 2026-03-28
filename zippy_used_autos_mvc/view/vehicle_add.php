<?php include __DIR__ . '/header.php'; ?>

<section class="card">
    <h2>Add New Vehicle</h2>
    <form action="index.php" method="post" class="stack-form">
        <input type="hidden" name="action" value="add_vehicle">

        <label>Year
            <input type="number" name="year" min="1900" max="2099" required>
        </label>

        <label>Model
            <input type="text" name="model" required>
        </label>

        <label>Price
            <input type="number" name="price" step="0.01" min="0" required>
        </label>

        <label>Make
            <select name="make_id" required>
                <?php foreach ($makes as $make): ?>
                    <option value="<?= $make['make_id'] ?>"><?= htmlspecialchars($make['make_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Type
            <select name="type_id" required>
                <?php foreach ($types as $type): ?>
                    <option value="<?= $type['type_id'] ?>"><?= htmlspecialchars($type['type_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Class
            <select name="class_id" required>
                <?php foreach ($classes as $class): ?>
                    <option value="<?= $class['class_id'] ?>"><?= htmlspecialchars($class['class_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <div class="actions">
            <button type="submit">Add Vehicle</button>
            <a class="button secondary" href="index.php">Back</a>
        </div>
    </form>
</section>

<?php include __DIR__ . '/footer.php'; ?>
