<?php
// 設問8-要件b: フォーム以外（POST以外）からアクセスされた場合、contact.phpにリダイレクト
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// 設問8-要件a: POSTデータを受け取る
$name = isset($_POST['name']) ? $_POST['name'] : '';
$companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// 設問8-メール送信の実装
// a) 宛先 (ご自身のメールアドレス等に書き換えてもOKです)
$to = "admin@example.com"; 
// b) 件名
$subject = "お問い合わせがありました";
// c) 本文（すべての項目を含める）
$body = "名前: " . $name . "\n" .
        "会社名: " . $companyName . "\n" .
        "メールアドレス: " . $email . "\n" .
        "年齢: " . $age . "\n" .
        "お問い合わせ内容:\n" . $message;

$headers = "From: " . $email;

// mail()関数の戻り値で成功・失敗のメッセージを分岐させて変数に代入
// (※Docker環境では実際には飛ばなくても、この分岐ルールが評価されます)
if (mail($to, $subject, $body, $headers)) {
    // 設問8-d: 成功メッセージ
    $resultMessage = "お問い合わせが送信されました。ありがとうございます！";
} else {
    // 設問8-e: エラーメッセージ（※環境によっては失敗判定になることがあるため両方用意）
    $resultMessage = "メールの送信に失敗しました。時間をおいて再度お試しください。";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <!-- 設問6-b: titleの指定 -->
    <title>お問い合わせフォーム送信完了画面</title>
</head>
<body>

    <!-- 設問6-a: h1タグで作成 -->
    <h1>お問い合わせフォーム - 送信完了画面</h1>

    <p>
        <!-- 設問6-e: メッセージはPHP側で出力させる -->
        <?php echo $resultMessage; ?>
    </p>

    <!-- 設問6-c, d: contact.phpへ遷移するリンクにする -->
    <a href="contact.php">お問い合わせフォームに戻る</a>

</body>
</html>
