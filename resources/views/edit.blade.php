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
        <h2>取引の編集</h2>
        <form id="editTransactionForm" action="{{ route('dashboard.update', $record->id) }}" method="POST">

            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="editType">費目:</label>
                <select id="editType" name="editType" class="form-control">
                    <option value="" selected>選択してください</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_id }}" {{ $record->category_id == $category->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="editAmount">金額:</label>
                <input type="number" id="editAmount" name="editAmount" class="form-control" value="{{ $record->amount }}" required>
            </div>
            <div class="form-group">
                <label for="editDescription">備考:</label>
                <textarea id="editDescription" name="editDescription" class="form-control" rows="3"></textarea>
            </div>
            <button class="btn btn-warning btn-sm" onclick="location.href='{{ url('/dashboard') }}'">入力内容を破棄して戻る</button>        <!-- エラーがでているが、laravelがHTML文とscript文を区別できていない模様 -->
            <button type="submit" class="btn btn-submit" onclick="location.href='dashboard'">更新</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
