<?php include __DIR__ . '/header.php'; ?>
<section class="card">
    <h2>Manage Classes</h2>
    <form action="classes.php" method="post" class="inline-form">
        <input type="hidden" name="action" value="add_class">
        <input type="text" name="class_name" placeholder="New class name" required>
        <button type="submit">Add Class</button>
        <a class="button secondary" href="index.php">Back</a>
    </form>
</section>

<section class="card">
    <table>
        <thead><tr><th>Class</th><th>Delete</th></tr></thead>
        <tbody>
        <?php foreach ($classes as $class): ?>
            <tr>
                <td><?= htmlspecialchars($class['class_name']) ?></td>
                <td>
                    <form action="classes.php" method="post">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">
                        <button class="danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php include __DIR__ . '/footer.php'; ?>
