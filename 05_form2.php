<?php
$name = '';
$tel = '';
$email = '';
$item_key = '';
$err_msgs = [];

$items = ['バッグ', '靴', '時計', 'ネックレス', 'ピアス'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $email = $_POST['email'] ?? '';
    $item_key = $_POST['item_key'] ?? '';

    // バリデーション 
    if (empty($name)) {
        $err_msgs[] = '氏名を入力してください';
    }
    if (empty($tel)) {
        $err_msgs[] = '電話番号を入力してください';
    }
    if (empty($email)) {
        $err_msgs[] = 'メールアドレスを入力してください';
    }

    // アイテムの選択チェック 
    if (!isset($items[$item_key])) {
        $err_msgs[] = '購入するアイテムを選択してください';
    }

    // エラーがなければ確認画面へリダイレクト
    if (empty($err_msgs)) {
        $selected_item = $items[$item_key];

        header('Location: 05_confirm.php?purchase_item=' . $selected_item);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文フォーム</title>
</head>

<body>
    <h3>個人情報を入力してください</h3>

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
            <label>氏名</label><br>
            <input type="text" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div>
            <label>電話番号</label><br>
            <input type="tel" name="tel" value="<?= htmlspecialchars($tel, ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div>
            <label>メールアドレス</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <h3>購入するものを選択してください</h3>
        <select name="item_key">
            <?php foreach ($items as $key => $item): ?>
                <option value="<?= $key ?>" <?= (string)$item_key === (string)$key ? 'selected' : '' ?>>
                    <?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>
        <div>
            <input type="submit" value="送信">
        </div>
    </form>
</body>

</html>
