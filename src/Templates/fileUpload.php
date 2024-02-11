<!DOCTYPE html>
<html lang="en">

<head>
    <?php require("../src/Templates/common/head.php"); ?>
    <title>Login</title>
</head>

<h1>Login</h1>

<form method="POST" action="/files/upload" enctype="multipart/form-data">
    <p for="file">Upload your file</p>
    <input type="file" name="file" /> <br><br>
    <input type="submit">
</form>

<body>
    <script src="index.js"></script>
</body>

</html>
