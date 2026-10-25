// --- 設問9, 10, 11, 12: フォームの入力チェック ---
function checkForm() {
    // DOMから値を取得する
    let name = document.getElementById('name').value;
    let companyName = document.getElementById('companyName').value;
    let email = document.getElementById('email').value;
    let age = document.getElementById('age').value;
    let message = document.getElementById('message').value;

    // 設問10, 11: いずれかが空欄（""）の場合の処理
    if (name === "" || companyName === "" || email === "" || age === "" || message === "") {
        alert("必須項目が未入力です。入力内容をご確認ください。");
        return false; // 送信をキャンセル
    }

    // 設問12: すべて埋まっている場合、確認ダイアログを出す
    let confirmMsg = "下記の内容を本当に送信しますか?\n\n" +
                     "お名前 ➡ " + name + "\n" +
                     "会社名 ➡ " + companyName + "\n" +
                     "メールアドレス ➡ " + email + "\n" +
                     "年齢 ➡ " + age + "\n" +
                     "お問い合わせ内容 ➡ " + message;

    let result = confirm(confirmMsg);
    
    if (result === true) {
        return true; // 送信を実行
    } else {
        return false; // キャンセルされたら送信を中止
    }
}

// --- 設問13: 背景色を変更するボタンの実装 ---
// document.querySelectorを使用する
let colorBtn = document.querySelector('#colorBtn');
let footerElement = document.querySelector('footer');

// 4色を配列に保存
let colors = ['blue', 'red', 'yellow', 'gray'];
let currentIndex = 0;

// ボタンがクリックされたときの処理
colorBtn.onclick = function() {
    // 配列の長さで割った余りを使って循環させる
    currentIndex = (currentIndex + 1) % colors.length;
    footerElement.style.backgroundColor = colors[currentIndex];
};

