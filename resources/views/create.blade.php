<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集ページ</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .back{
            text-align:left;
        }
        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-submit {
            padding: 0.75rem 1.5rem;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
            text-align:right;
            float:right;
        }

        .btn-submit:hover {
            background-color: #555;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>新規取引の登録</h2>
        <form method="POST" action="{{ route('create') }}" id="editTransactionForm">
            @csrf
            <div class="form-group">
                <label for="editType">費目:</label>
                <select id="editType" name="editType" class="form-control">
                    <option value="" selected>選択してください</option>
                    <option value="1">給料</option>
                    <option value="2">雑収入</option>
                    <option value="3">食費</option>
                    <option value="4">外食費</option>
                    <option value="5">生活用品</option>
                    <option value="6">車ローン</option>
                    <option value="7">家賃・住宅ローン</option>
                    <option value="8">電気代</option>
                    <option value="9">ガス代</option>
                    <option value="10">水道代</option>
                    <option value="11">通信費</option>
                    <option value="12">医療費</option>
                    <option value="13">保険代</option>
                    <option value="14">国民健康保険</option>
                    <option value="15">市民税</option>
                    <option value="16">固定資産税</option>
                    <option value="17">繰越残高</option>
                    <option value="18">雑費・その他</option>
                </select>
            </div>
            <div class="form-group">
                <label for="editAmount">金額:</label>
                <input type="number" id="editAmount" name="editAmount" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editDescription">備考:</label>
                <textarea id="editDescription" name="editDescription" class="form-control" rows="3"></textarea>
            </div>
            <button class="btn btn-warning btn-sm" onclick="location.href='dashboard'">入力内容を破棄して戻る</button>
            <button type="submit" class="btn btn-submit">登録</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
