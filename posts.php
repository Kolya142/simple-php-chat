<?php
$username = $_COOKIE['user'] ?? $_SERVER['REMOTE_ADDR'];
$password = $_COOKIE['password'] ?? 'anonim';
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "mypage";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
$sql = "SELECT username, text, image FROM posts";
$result = $conn->query($sql);
$posts = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}
?>
<body>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div>
                <h2><?php echo htmlspecialchars($post['username']); ?></h2>
                <p><?php echo nl2br($post['text']); ?></p>
                <?php if ($post['image'] !== ''): ?>
                    <img src="data:image/png;base64,<?php echo $post['image']; ?>" style="height:100px;" alt="Image" />
                <?php endif; ?>
                <hr>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Не найдено постов</p>
    <?php endif; ?>
    <form method="POST" action="postpost.php" enctype="multipart/form-data">
        Контент: <textarea name="text"></textarea><br>
        Картинка: <input type="file" id="fileInput" name="image"><br>
        <input type="submit" value="Отправить">
    </form>
</body>