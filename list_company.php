<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM Companies";
    $result = $conn->query($sql);
    $results = $result->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body>
<div>
<a class="btn btn-primary" href="list_new_form.php">Create new company</a>
</div>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Company</th>
        <th>Link</th>
        <th>Del</th>
        <th>Change</th>
    </tr>
    <? foreach ($results as $value): ?>
    <tr>
        <td><?= $value['num'] ?></td>
        <td><?= $value['name_c'] ?></td>
        <td><a href="list_c_3.php"> link</a></td>
        <td>
            <form action="delete.php?id=<?= $value['num'] ?>" method="post">
                <input type="submit" class="btn btn-default" value="del">
            </form>
        </td>
        <td>
            <form action="change_form.php?id=<?= $value['num'] ?>" method="post">
                <input type="submit" value="change" class="btn btn-default">
            </form>
        </td>
    <? endforeach ?>
</table>
</body>
</html>


