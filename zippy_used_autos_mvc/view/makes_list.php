<?php include __DIR__ . '/header.php'; ?>
<section class="card">
    <h2>Manage Makes</h2>
    <form action="makes.php" method="post" class="inline-form">
        <input type="hidden" name="action" value="add_make">
        <input type="text" name="make_name" placeholder="New make name" required>
        <button type="submit">Add Make</button>
        <a class="button secondary" href="index.php">Back</a>
    </form>
</section>

<section class="card">
    <table>
        <thead><tr><th>Make</th><th>Delete</th></tr></thead>
        <tbody>
        <?php foreach ($makes as $make): ?>
            <tr>
                <td><?= htmlspecialchars($make['make_name']) ?></td>
                <td>
                    <form action="makes.php" method="post">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="make_id" value="<?= $make['make_id'] ?>">
                        <button class="danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php include __DIR__ . '/footer.php'; ?>
