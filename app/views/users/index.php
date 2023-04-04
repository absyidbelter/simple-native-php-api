<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user["name"] ?> (<?= $user["email"] ?>)</li>
        <?php endforeach ?>
    </ul>
    <form method="post" action="/user">
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Email:</label><br>
        <input type="email" name="email"><br><br>
        <input type="submit" value="Create User">
    </form>
</body>
</html>
