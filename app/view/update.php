<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="../../public/style/style.css">
</head>
<body>
    <h1>Update User</h1>
    <form class="formulario" action="../index.php" method="post">
        <input type="number" name="id" placeholder="ID" required>
        <input type="text" name="name" placeholder="Name" maxlength="25" required>
        <input type="text" name="surname" placeholder="Surname" maxlength="50" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="telephone" placeholder="Telephone" maxlength="9" required>
        <button type="submit" name="submit_update">Update</button>
        <button type="button" onclick="location.href='../../public/index.php'">Return</button>
    </form>
    <!-- cargar aqui la tabla entera con todos los usuarios -->
</body>
</html>