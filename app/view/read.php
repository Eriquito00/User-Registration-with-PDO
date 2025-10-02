<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read User</title>
    <link rel="stylesheet" href="../../public/style/style.css">
</head>
<body>
    <h1>Read User</h1>
    <form class="formulario" action="../controller/read.php" method="post">
        <input type="number" name="id" placeholder="ID">
        <p><?= htmlspecialchars($errorMessage ?? '') ?></p>
        <button type="submit" name="submit_readOne">Read one</button>
        <button type="submit" name="submit_readAll">Read all</button>
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