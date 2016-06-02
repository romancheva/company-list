<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT * FROM Companies WHERE num = :id";
    $result = $conn->prepare($sql);
    $result->bindValue(':id', $_GET['id']);
    $res = $result->execute();

    if ($result->rowCount() > 0) {
       // echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Date</th><th>Address</th><th>Tel num</th><th>link</th><th>About</th><th>Logo</th><th>Photo</th></tr>";
        // output data of each row

        $results = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $row){
          //  echo "<tr><td>". $row['num']."</td><td>" . $row["name_c"] . "</td><td>" . $row["date"] . "</td><td>" . $row["address"] . "</td><td>" . $row["tel_num"] . "</td><td>" . $row["link"] . "</td><td>" . $row["about"] . "</td><td>" . $row["logo"] . "</td><td>" . $row["photo"] . "</td></tr>";
           // echo $row["num"].PHP_EOL;
           // echo $_POST.PHP_EOL;
           }
        echo "</table>";
    } else {
        echo "0 results";
    }
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$gg = $_GET["id"];
$dk = $row;

?>

<html>
    <form method="post" action="new_3.php">
    Name of the company: <input name="name_c" value="<?=$dk['name_c']?>"></br>
    Date of creation: <input name="date" value="<?=$dk['date']?>"></br>
    Address: <input name="address" value="<?=$dk['address']?>"></br>
    Tel num: <input name="tel_num" value="<?=$dk['tel_num']?>"></br>
    Link to website: <input name="link" value="<?=$dk['link']?>"></br>
    About: <input name="about" value="<?=$dk['about']?>"></br>
    Logo: <input name="logo" value="<?=$dk['logo']?>"></br>
    Photo of director: <input name="photo" value="<?=$dk['photo']?>"></br>
    <input type="hidden" name="num" value="<?=$dk['num']?>">
    <input type="submit">
</form>
</html>