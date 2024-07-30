<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['user'];
    $password = $_POST['password'];
    echo 'username: ' . $username . ', password: ' . $password;
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "mypage";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    $sql = "INSERT INTO users (name, password) VALUES ('$username', '$password')";
    $conn->query($sql);
    setcookie("user", $username);
    setcookie("pass", $password);
    header("Location: /mypage/posts.php");
}
?>