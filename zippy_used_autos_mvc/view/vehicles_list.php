<?php include __DIR__ . '/header.php'; ?>

<section class="card">
    <h2>Vehicle Inventory</h2>

    <form method="get" class="controls">
        <label for="sort">Sort by:</label>
        <select name="sort" id="sort">
            <option value="price" <?= $sort === 'price' ? 'selected' : '' ?>>Price (High to Low)</option>
            <option value="year" <?= $sort === 'year' ? 'selected' : '' ?>>Year (Newest to Oldest)</option>
        </select>

        <label for="filter_type">Filter category:</label>
        <select name="filter_type" id="filter_type" onchange="this.form.submit()">
            <option value="">None</option>
            <option value="make" <?= $filter_type === 'make' ? 'selected' : '' ?>>Make</option>
            <option value="type" <?= $filter_type === 'type' ? 'selected' : '' ?>>Type</option>
            <option value="class" <?= $filter_type === 'class' ? 'selected' : '' ?>>Class</option>
        </select>

        <?php if ($filter_type === 'make'): ?>
            <select name="filter_id">
                <option value="">Choose Make</option>
                <?php foreach ($makes as $make): ?>
                    <option value="<?= $make['make_id'] ?>" <?= (int)$filter_id === (int)$make['make_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($make['make_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php elseif ($filter_type === 'type'): ?>
            <select name="filter_id">
                <option value="">Choose Type</option>
                <?php foreach ($types as $type): ?>
                    <option value="<?= $type['type_id'] ?>" <?= (int)$filter_id === (int)$type['type_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($type['type_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php elseif ($filter_type === 'class'): ?>
            <select name="filter_id">
                <option value="">Choose Class</option>
                <?php foreach ($classes as $class): ?>
                    <option value="<?= $class['class_id'] ?>" <?= (int)$filter_id === (int)$class['class_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($class['class_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>

        <button type="submit">Apply</button>
        <a class="button secondary" href="index.php">Reset</a>
    </form>
</section>

<section class="card">
    <table>
        <thead>
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($vehicles as $vehicle): ?>
            <tr>
                <td><?= htmlspecialchars($vehicle['year']) ?></td>
                <td><?= htmlspecialchars($vehicle['make_name']) ?></td>
                <td><?= htmlspecialchars($vehicle['model']) ?></td>
                <td><?= htmlspecialchars($vehicle['type_name']) ?></td>
                <td><?= htmlspecialchars($vehicle['class_name']) ?></td>
                <td>$<?= number_format($vehicle['price'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php include __DIR__ . '/footer.php'; ?>
