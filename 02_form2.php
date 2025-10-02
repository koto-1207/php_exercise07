<?php

$score = '';
$err_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = $_POST['score'];
    if (empty($score)) {
        $err_msg = '点数が入力されていません。';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>埋め込み</title>
</head>

<body>
    <?php if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $err_msg): ?>
        <h1>点数を入力して下さい</h1>
    <?php endif; ?>

    <?php if ($err_msg): ?>
        <ul>
            <li><?php echo $err_msg; ?></li>
        </ul>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $score !== ''): ?>
        <?php if ($score >= 60): ?>
            <h2>合格です</h2>
        <?php else: ?>
            <h2>不合格です</h2>
        <?php endif; ?>
    <?php endif; ?>

    <form action="" method="post">
        <input type="number" name="score" value="<?php echo htmlspecialchars($score); ?>">
        <input type="submit" value="送信">
    </form>

</body>

</html>
