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
    $sql = 'SELECT * FROM users WHERE name = \'' . $username . '\' AND password = \'' . $password . '\'';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "User exists.";
        setcookie("user", $username);
        setcookie("pass", $password);
        header("Location: /mypage/posts.php");
    } else {
        echo "Пользователь отсуствует.";
    }
    header("Location: /mypage/posts.php");
}
?>