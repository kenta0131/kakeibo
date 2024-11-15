<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家計簿ダッシュボード</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f4f4f4, #e8e8e8);
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
        }

        header h1 {
            margin: 0;
            font-weight: 700;
            font-size: 2rem;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 400;
        }

        header nav a:hover {
            text-decoration: underline;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        #overview {
            background-color: #fff;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        #chart-container, #add-transaction {
            background-color: #fff;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 48%;
            box-sizing: border-box;
        }

        #chart-container {
            order: 1;
        }

        #add-transaction {
            order: 2;
        }

        #transactions {
            background-color: #fff;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            order: 3;
        }

        #overview .balance {
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .balance div {
            flex: 1;
        }

        h2 {
            margin-bottom: 1rem;
            font-weight: 700;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-bottom: 0.5rem;
            font-weight: 400;
        }

        form input, form select {
            margin-bottom: 1rem;
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            padding: 0.75rem 1.5rem;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .add-transaction-button {
            margin-bottom: 1rem;
        }

        form button:hover {
            background-color: #555;
            transform: translateY(-2px);
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .transaction-description {
            flex-grow: 1;
        }

        .transaction-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .transaction-buttons button {
            margin-left: 0.5rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>家計簿ダッシュボード</h1>
        <nav>
            <a href="logout.html">ログアウト</a>
        </nav>
    </header>
    @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
    <main>
        <section id="overview">
            <h2>収支概要</h2>
            <div class="balance">
                <div class="income">
                    <h3>総収入</h3>
                    <p>¥ {{ number_format($totalIncome) }}</p>
                </div>
                <div class="expense">
                    <h3>総支出</h3>
                    <p>¥ {{ number_format($totalExpence) }}</p>
                </div>
                <div class="total">
                    <h3>収支合計</h3>
                    <p>¥ {{ number_format($balance) }}</p>
                </div>
            </div>
        </section>
        <section id="chart-container">
            <h2>支出の割合</h2>
            <canvas id="expenseChart"></canvas>
        </section>
        <section id="add-transaction">
            <h2>新しい取引の追加</h2>
            <button class="btn btn-primary add-transaction-button" onclick="location.href='create'">新規登録ページへ</button>
            <form>
                <label for="description">備考:</label>
                <input type="text" id="description" name="description" required>
                <label for="amount">金額:</label>
                <input type="number" id="amount" name="amount" required>
                <label for="type">費目:</label>
                <select id="type" name="type">
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
                <button type="submit">追加</button>
            </form>
        </section>
        <section id="transactions">
            <h2>最近の取引</h2>
            <ul class="list-group">
                @foreach($dashboards as $dashboard)
                <li class="list-group-item transaction-item">
                    <span class="transaction-description">{{ $dashboard->category_name }}</span>
                    <span class="transaction-description">{{ number_format($dashboard->amount) }} 円</span>

                    <!-- ボタンをリストアイテムの中に配置 -->
                    <div class="transaction-buttons">
                        <!-- 再編集ボタン -->
                        <form action="{{ route('dashboard.edit', $dashboard->id) }}" method="GET" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">編集</button>
                        </form>

                        <!-- 削除ボタン -->
                        <form action="{{ route('dashboard.destroy', $dashboard->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('expenseChart').getContext('2d');
        const expenseChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['食費', '交通費', 'その他'],
                datasets: [{
                    label: '支出の割合',
                    data: [1000, 2000, 500], // サンプルデータ
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'JPY' }).format(context.parsed);
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
