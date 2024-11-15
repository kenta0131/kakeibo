<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家計簿アプリへようこそ</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        text-align: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem 0;
        }

        main {
            padding: 2rem;
        }

        #welcome {
            background-color: #fff;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 1rem;
        }

        p {
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #555;
        }

        .logo {
        max-width: 250px;
        height: auto;
        }

    </style>
</head>
<body>
    <header>
        <h1>家計簿アプリ</h1>
    </header>
    <main>
        <img src="{{ asset('images/logo.png') }}" alt="ロゴ" class="logo">
        <section id="welcome">
            <h2>家計簿アプリへようこそ！</h2>
            <p>このアプリであなたの収入と支出を簡単に管理しましょう。今すぐ登録して、家計管理を始めましょう！</p>
            <div class="buttons">
              <a href="dashboard" class="btn">今すぐ始める</a>
<!--
                <a href="register.html" class="btn">登録</a>
                <a href="login.html" class="btn">ログイン</a>
-->
            </div>
        </section>
    </main>
</body>
</html>
