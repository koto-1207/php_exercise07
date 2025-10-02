<?php
$stylists = [
    'スタイリスト' => 'Takashi',
    'ハイスタイリスト' => 'Ken',
    'トップスタイリスト' => 'Kyoutaro'
];

$select_stylist = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $select_stylist = filter_input(INPUT_POST, 'stylist');
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>埋め込み</title>
</head>

<body>
    <h1>希望する美容師のランクを選んでください</h1>

    <form action="" method="post">
        <select name="stylist">
            <?php foreach ($stylists as $label => $value): ?>
                <option value="<?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>"
                    <?= $select_stylist === $value ? 'selected' : '' ?>>
                    <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" value="送信">
    </form>

    <?php if ($select_stylist): ?>
        <p>あなたの担当は <?= htmlspecialchars($select_stylist, ENT_QUOTES, 'UTF-8') ?> です。</p>
    <?php endif; ?>
</body>

</html>
