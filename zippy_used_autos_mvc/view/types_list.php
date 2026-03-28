<?php include __DIR__ . '/header.php'; ?>
<section class="card">
    <h2>Manage Types</h2>
    <form action="types.php" method="post" class="inline-form">
        <input type="hidden" name="action" value="add_type">
        <input type="text" name="type_name" placeholder="New type name" required>
        <button type="submit">Add Type</button>
        <a class="button secondary" href="index.php">Back</a>
    </form>
</section>

<section class="card">
    <table>
        <thead><tr><th>Type</th><th>Delete</th></tr></thead>
        <tbody>
        <?php foreach ($types as $type): ?>
            <tr>
                <td><?= htmlspecialchars($type['type_name']) ?></td>
                <td>
                    <form action="types.php" method="post">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="type_id" value="<?= $type['type_id'] ?>">
                        <button class="danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php include __DIR__ . '/footer.php'; ?>
