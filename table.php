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

    if ($result->rowCount() > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Date</th><th>Address</th><th>Tel num</th><th>link</th><th>About</th><th>Logo</th><th>Photo</th></tr>";
        // output data of each row

        $results = $result->fetchAll();
        foreach($results as $row){
            echo "<tr><td>". $row['num']."</td><td>" . $row["name_c"] . "</td><td>" . $row["date"] . "</td><td>" . $row["address"] . "</td><td>" . $row["tel_num"] . "</td><td>" . $row["link"] . "</td><td>" . $row["about"] . "</td><td>" . $row["logo"] . "</td><td>" . $row["photo"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
