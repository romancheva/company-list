<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM Companies WHERE num=:num");
    $stmt->bindParam(':num', $_GET["id"]);

    $stmt->execute();

    echo "New record created successfully";

}catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>
