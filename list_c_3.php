<?php
//$data = file_get_contents("list.json");
//$data = json_decode($data, true);

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM Companies";
    $result = $conn->query($sql);
    $results = $result->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$id = 0;
if(!empty($_POST)) {
    $row = $_POST;

    if(!empty($row['id'])){
        $id = $row['id'];
    }else{
        $lastData = end($data);
        if(!empty($lastData)){
            $id = $lastData['id'] + 1;
        }

        $row['id'] = $id;
    }
    $data[$id] = $row;
    $ser = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("list.json", $ser);
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<?php
var_dump($results);
foreach($results as $value){
?>

<h3><?=$value['name_c'] ?></h3>

<table style="width:100%">

    <tr>
        <td>Date of creation</td>
        <td><?=$value['date'] ?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?=$value['address'] ?></td>
    </tr>
    <tr>
        <td>Tel num</td>
        <td><?=$value['tel_num'] ?></td>
    </tr>
    <tr>
        <td>Link to website</td>
        <td><a href="<?=$value['link'] ?>"><?=$value['link'] ?></a> </td>
    </tr>
    <tr>
        <td>About</td>
        <td><?=$value['about'] ?></td>
    </tr>
    <tr>
        <td>Logo</td>
        <td><img src="<?=$value['logo'] ?>"></td>
    </tr>
    <tr>
        <td>Photo of director</td>
        <td><img src="<?=$value['photo'] ?>"></td>
    </tr>
</table>
<form method="post" action="list_company.php">
    <input type="submit" value="home">
</form>


<?}?>

</body>
</html>
<?
$g = $_GET["id"];
print_r($g);
foreach($results as $key=>$value){
    if($value["id"] == $g){
        unset($data[$key]);
    }
}
$ser = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents("list.json", $ser);
?>
