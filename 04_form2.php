<?php

$name = '';
$tel = '';
$email = '';
$item_key = '';
$err_msgs = [];
$result = false;

$items = ['バッグ', '靴', '時計', 'ネックレス', 'ピアス'];

// コードを追記
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name');
    $tel = filter_input(INPUT_POST, 'tel');
    $email = filter_input(INPUT_POST, 'email');
    $item_key = filter_input(INPUT_POST, 'item_key');

    if (empty($name)) {
        $err_msgs[] = '氏名を入力してください';
    }
    if (empty($tel)) {
        $err_msgs[] = '電話番号を入力してください';
    }
    if (empty($email)) {
        $err_msgs[] = 'メールアドレスを入力してください';
    }
    if (empty($err_msgs)) {
        $result = true;
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
    <h3>個人情報を入力してください</h3>

    <!-- エラーメッセージ -->
    <?php if (!empty($err_msgs)): ?>
        <h2>エラーメッセージ</h2>
        <ul>
            <?php foreach ($err_msgs as $msg): ?>
                <li><?= htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="post">
        <div>
            <label for="">氏名</label><br>
            <input type="text" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
        </div>

        <div>
            <label for="">電話番号</label><br>
            <input type="tel" name="tel" value="<?= htmlspecialchars($tel, ENT_QUOTES, 'UTF-8'); ?>">
        </div>

        <div>
            <label for="">メールアドレス</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
        </div>

        <h3>購入するものを選択してください</h3>
        <select name="item_key">
            <?php foreach ($items as $item): ?>
                <option value="<?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?>" <?= $item_key === $item ? 'selected' : '' ?>>
                    <?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br>
        <div class=" submit">
            <input type="submit" value="送信">
        </div>
    </form>

    <?php if ($result): ?>
        <h3>以下の内容が送信されました</h3>
        <table>
            <tr>
                <td>氏名:</td>
                <td><?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td>電話番号:</td>
                <td><?= htmlspecialchars($tel, ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td>メールアドレス:</td>
                <td><?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td>購入するもの:</td>
                <td><?= htmlspecialchars($item_key, ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        </table>
    <?php endif; ?>



</body>

</html>
