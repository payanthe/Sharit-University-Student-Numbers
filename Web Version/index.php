<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sn";
$esm = "";
$id = "";
if (isset($_GET['sn'])) {
    $id = $_GET['sn'];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT student_name FROM data  WHERE `student_number` = '" . $id . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $esm = $row["student_name"];
        }
    } else {
        $esm = "Not Found!!";
    }

    mysqli_close($conn);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fullscreen Login Form UI Design</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section>
    <div class="container">
        <div class="login-form">
            <h1 style="font-size: 2em">Student Number To Name</h1>
            <h1 style="font-size:1.5em; color: #0072ff"><?= $id ?></h1>
            <h1 style="font-size:1.5em; color: deepskyblue"><?= $esm ?></h1>
            <form action="" method="GET">
                <input type="text" name="sn" placeholder="Insert Student Number">
                <input type="submit" name="" value="Search">
            </form>
        </div>
    </div>
</section>
</body>
</html>
