<?php
$score = '';
$err_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = $_POST['score'];

    if ($score === '' || !is_numeric($score)) {
        $err_msg = '点数が入力されていません。';
    } else {
        header('Location: 03_judge_ment.php?score=' . $score);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>点数入力</title>
</head>

<body>

    <h1>点数を入力して下さい</h1>

    <?php if ($err_msg): ?>
        <ul>
            <li><?php echo $err_msg; ?></li>
        </ul>
    <?php endif; ?>

    <form action="" method="post">
        <input type="number" name="score" value="<?php echo htmlspecialchars($score); ?>">
        <input type="submit" value="送信">
    </form>

</body>

</html>
