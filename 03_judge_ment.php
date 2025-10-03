<?php

$score = $_GET['score'] ?? '';
$message = '';

if ($score !== '') {
    if ($score >= 60) {
        $message = '合格です';
    } else {
        $message = '不合格です';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>結果</title>
</head>

<body>

    <h2><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></h2>

    <p><a href="03_form2.php">戻る</a></p>

</body>

</html>
