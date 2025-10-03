<?php

$score = '';
$err_msg = '';
$msg = '点数を入力してください';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = $_POST['score'];

    if ($score === '') {
        $err_msg = '点数が入力されていません';
    } elseif ($score >= 60) {
        $msg = '合格です';
    } else {
        $msg = '不合格です';
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
    <h1><?= "{$msg}"; ?></h1>

    <?php if ($err_msg): ?>
        <ul>
            <li><?php echo htmlspecialchars($err_msg, ENT_QUOTES, 'UTF-8'); ?></li>
        </ul>
    <?php endif; ?>

    <form action="" method="post">
        <input type="number" name="score" value="<?php echo htmlspecialchars($score); ?>">
        <input type="submit" value="送信">
    </form>

</body>

</html>
