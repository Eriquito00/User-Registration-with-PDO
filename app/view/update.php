<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="../../public/style/style.css">
</head>
<body>
    <h1>Update User</h1>
    <form class="formulario" action="../controller/update.php" method="post">
        <input type="number" name="id" placeholder="ID" required value="<?= htmlspecialchars($id) ?>">
        <input type="text" name="name" placeholder="Name" maxlength="25" required value="<?= htmlspecialchars($name) ?>">
        <input type="text" name="surname" placeholder="Surname" maxlength="50" required value="<?= htmlspecialchars($surname) ?>">
        <input type="email" name="email" placeholder="Email" required value="<?= htmlspecialchars($email) ?>">
        <input type="text" name="telephone" placeholder="Telephone +123 123456789" maxlength="14" required value="<?= htmlspecialchars($telephone) ?>">
        <p><?= htmlspecialchars($errorMessage ?? ""); ?></p>
        <button type="submit" name="submit_update">Update</button>
        <button type="button" onclick="location.href='../../public/index.php'">Return</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Telephone</th>
        </tr>
        <?php for ($i = 0; $i < count($users ?? []); $i++): ?>
        <tr>
            <td><?php echo htmlspecialchars($users[$i]['user_id']); ?></td>
            <td><?php echo htmlspecialchars($users[$i]['name']); ?></td>
            <td><?php echo htmlspecialchars($users[$i]['surname']); ?></td>
            <td><?php echo htmlspecialchars($users[$i]['email']); ?></td>
            <td><?php echo htmlspecialchars($users[$i]['telephone']); ?></td>
        </tr>
        <?php endfor; ?>
    </table>
</body>
</html>