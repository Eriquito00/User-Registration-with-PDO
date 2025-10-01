<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="../../public/style/style.css">
</head>
<body>
    <h1>Delete User</h1>
    <form class="formulario" action="../index.php" method="post">
        <input type="number" name="id" placeholder="ID" required>
        <button type="submit" name="submit_delete">Delete</button>
        <button type="button" onclick="location.href='../../public/index.php'">Return</button>
    </form>
    <!-- cargar aqui la tabla entera con todos los usuarios -->
</body>
</html>