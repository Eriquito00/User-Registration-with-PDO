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
    <form class="formulario">
        <input type="text" name="id" placeholder="ID">
        <button type="submit">Read one</button>
        <button type="submit">Read all</button>
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
    </table>
</body>
</html>