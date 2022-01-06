<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //Pagination in PHP with MySQL
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "school";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("failed" . $conn->connect_error);
    } else {
    }
    $sql = "SELECT * FROM `Student`";
    $res = $conn->query($sql);
    $no_of_products = $res->num_rows;
    $no_of_products_per_page = 4;
    echo "<br>";
    echo $no_of_page = ceil($no_of_products / $no_of_products_per_page);
    echo "<br>";
    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    $start_limit = ($page - 1) * $no_of_products_per_page;

    echo $sql1 = "SELECT * FROM `Student` limit $start_limit,$no_of_products_per_page ";
    $ress = $conn->query($sql1);
    while ($row = $ress->fetch_assoc()) {
        echo "<br>";
        echo "age:" . $row["age"];
        echo "<br>";
        echo "Student_Name:" . $row["Student_Name"];
        echo "<br>";
        echo "Mobile_Number:" . $row["Mobile_Number"];
        echo "<br>";
        echo "gender:" . $row["gender"];
        echo "<br>";
    }

    echo "<br>";
    for ($i = 1; $i <= $no_of_page; $i++) {
        echo "<a href='home.php?page={$i}'>{$i}</a>";
    }

    ?>

</body>

</html>