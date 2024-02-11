<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("../src/Templates/common/head.php"); ?>
    <title>Login</title>
</head>

<h1>Login</h1>

<form method="POST" action="/users/login">
    <?php var_dump($validationErrors); ?>
   <?php if (in_array("email", array_keys($validationErrors))) : ?>
        <?php foreach ($validationErrors["email"] as $key => $val) : ?>
            <p style="color: red;"><?= $val ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <label for="email">Email</label>
    <input type="text" name="email" autocomplete="off" /> <br>
    <?php if (in_array("password", array_keys($validationErrors))) : ?>
        <?php foreach ($validationErrors["password"] as $key => $val) : ?>
            <p style="color: red;"><?= $val ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    <label for="password">Password</label>
    <input type="password" name="password" autocomplete="off"><br><br>
    <input type="submit">
</form>

<body>
    <script src="index.js"></script>
</body>

</html>
