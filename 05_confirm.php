<?php
// 商品と価格の一覧
$prices = [
    'バッグ' => 1500,
    '靴' => 3000,
    '時計' => 6000,
    'ネックレス' => 9000,
    'ピアス' => 10000
];

$purchase_item = $_GET['purchase_item'] ?? '';
$price = null;
$error = false;

if ($purchase_item !== '' && isset($prices[$purchase_item])) {
    $price = $prices[$purchase_item];
} else {
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>注文確認</title>
</head>

<body>
    <h2>ご注文ありがとうございます</h2>

    <?php if (!$error): ?>
        <h2>お支払い金額は、<?= number_format($price) ?>円です</h2>
    <?php endif; ?>

    <br>
    <a href="05_form2.php">戻る</a>
</body>

</html>
