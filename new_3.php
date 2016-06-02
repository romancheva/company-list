<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!empty($_POST['num'])){
        $stmt = $conn->prepare("UPDATE Companies
SET name_c=:name_c, `date`=:date, address=:address, tel_num=:tel_num, link=:link, about=:about, logo=:logo, photo=:photo
WHERE num=:num");
        $stmt->bindParam(':num', $_POST["num"]);
    }else{
        $stmt = $conn->prepare("INSERT INTO Companies (name_c, `date`, address, tel_num, link, about, logo, photo)
    VALUES (:name_c, :date, :address, :tel_num, :link, :about, :logo, :photo)");
    }

    $stmt->bindParam(':name_c', $_POST["name_c"]);
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->bindParam(':address', $_POST["address"]);
    $stmt->bindParam(':tel_num', $_POST["tel_num"]);
    $stmt->bindParam(':link', $_POST["link"]);
    $stmt->bindParam(':about', $_POST["about"]);
    $stmt->bindParam(':logo', $_POST["logo"]);
    $stmt->bindParam(':photo', $_POST["photo"]);

    $stmt->execute();

    echo "New record created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>
