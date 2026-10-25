<?php
// 設問7-c: フォーム以外（POST以外）からアクセスされた場合、contact.phpにリダイレクト
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// 設問7-a: POSTメソッドで送信されたデータを受け取る
$name = isset($_POST['name']) ? $_POST['name'] : '';
$companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// 設問7-b: 入力されていない項目があればエラーを表示（JSを抜けてきた場合のセーフティ）
if ($name === '' || $companyName === '' || $email === '' || $age === '' || $message === '') {
    echo "エラー：未入力の項目があります。";
    exit;
}

// 設問7-e: HTMLの特殊文字をエスケープする関数（素人っぽくシンプルに定義）
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム確認画面</title>
</head>
<body>

    <!-- 設問4-b: headerとすること / 設問4-a: h2タグで作成 -->
    <header>
        <h2>お問い合わせフォーム - 確認画面</h2>
    </header>

    <div style="display: flex;">
        <!-- 設問4-i, j: サイドバー -->
        <aside style="width: 200px; padding-right: 20px;">
            <ul>
                <li><a href="#">トップページ</a></li>
                <li><a href="#">人気投稿</a></li>
                <li><a href="#">エンジニアおすすめ商品</a></li>
                <li><a href="#">エンジニアおすすめ記事</a></li>
                <li><a href="#">投稿ページ</a></li>
            </ul>
        </aside>

        <main>
            <!-- 設問4-c: テーブルの枠線の太さは3px / 設問7-d: テーブル形式で表示 -->
            <table border="3">
                <tr>
                    <th>お名前</th>
                    <td><?php echo h($name); ?></td>
                </tr>
                <tr>
                    <th>会社名</th>
                    <td><?php echo h($companyName); ?></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><?php echo h($email); ?></td>
                </tr>
                <tr>
                    <th>年齢</th>
                    <td><?php echo h($age); ?></td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td><?php echo nl2br(h($message)); ?></td>
                </tr>
            </table>

            <br>
            
            <!-- 設問4-h: 戻るボタンは history.back にする -->
            <button onclick="history.back();">戻る</button>

            <!-- 設問7-f: データをhiddenフィールドを使ってsend.phpに渡すフォーム -->
            <form action="send.php" method="POST" style="display: inline;">
                <input type="hidden" name="name" value="<?php echo h($name); ?>">
                <input type="hidden" name="companyName" value="<?php echo h($companyName); ?>">
                <input type="hidden" name="email" value="<?php echo h($email); ?>">
                <input type="hidden" name="age" value="<?php echo h($age); ?>">
                <input type="hidden" name="message" value="<?php echo h($message); ?>">
                
                <!-- 設問4-e, f, g: inputタグで作成、属性値をつけ、ボタン名は「送信」 -->
                <input type="submit" value="送信">
            </form>
        </main>
    </div>

</body>
</html>
