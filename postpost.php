<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_COOKIE['name'] ?? $_SERVER['REMOTE_ADDR'];
    $text = $_POST['text'];
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image']['tmp_name'];
        $fileContent = file_get_contents($file);
        $base64 = base64_encode($fileContent);
        $image = $base64;
    }
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "mypage";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    $sql = "INSERT INTO posts (username, text, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sss", $username, $text, $image);
    $stmt->execute();
    $stmt->close();
    header("Location: posts.php");
}
?>