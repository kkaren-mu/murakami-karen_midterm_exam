<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 設問2-m: titleの指定 -->
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- 設問2-b: headerとすること / 設問2-a: h2タグで作成 -->
    <header>
        <h2>お問い合わせフォーム</h2>
    </header>

    <div style="display: flex;">
        <!-- 設問2-i, j: sidebarの作成とリンク化 -->
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
            <!-- 事前情報: POSTメソッドで送信 -->
            <!-- 設問12: JavaScriptでチェックするため onSubmit を追加 -->
            <form action="confirm.php" method="POST" onsubmit="return checkForm();">
                
                <!-- 設問2-c: 枠線の太さは3px -->
                <table border="3">
                    <tr>
                        <th>お名前</th>
                        <!-- 設問2-d: size="40" で半角40文字分 / 事前情報: name属性 -->
                        <td><input type="text" id="name" name="name" size="40"></td>
                    </tr>
                    <tr>
                        <th>会社名</th>
                        <td><input type="text" id="companyName" name="companyName" size="40"></td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><input type="text" id="email" name="email" size="40"></td>
                    </tr>
                    <tr>
                        <th>年齢</th>
                        <td><input type="text" id="age" name="age" size="40"></td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容</th>
                        <!-- 設問2-e: テキストエリアにすること -->
                        <td><textarea id="message" name="message" rows="5" cols="40"></textarea></td>
                    </tr>
                </table>

                <br>
                <!-- 設問2-f, g, h: inputタグで、必要な属性値をつけ、値は「送信」 -->
                <input type="submit" value="送信">
            </form>
        </main>
    </div>

    <!-- 設問2-k, l: footer内に「押してみてね!」ボタンを作成 -->
    <footer>
        <hr>
        <p>横のボタンを押すとfooterの背景色が変わります。</p>
        <button id="colorBtn">押してみてね!</button>
    </footer>

    <script src="style.js"></script>
</body>
</html>
