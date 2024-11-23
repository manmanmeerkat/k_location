<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>製品リスト</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .search-form {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>製品リスト</h1>

    <!-- 検索フォーム -->
    <div class="search-form">
        <input type="text" id="search-input" placeholder="品番で検索" oninput="searchProducts()" />
    </div>

    <!-- 検索結果がない場合のメッセージ -->
    <p id="no-results" style="display: none;">該当する製品はありません。</p>

    <!-- 製品リストテーブル -->
    <table id="products-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>品番</th>
                <th>ロケーション番号</th>
            </tr>
        </thead>
        <tbody id="product-list">
            <tr>
                <td colspan="3">検索結果がここに表示されます。</td>
            </tr>
        </tbody>
    </table>

    <script>
        function searchProducts() {
            const query = document.getElementById('search-input').value;

            if (query.length < 1) {
                // 入力が空の場合は全製品を表示する
                document.getElementById('no-results').style.display = 'none';
                document.getElementById('product-list').innerHTML = '<tr><td colspan="3">検索結果がここに表示されます。</td></tr>';
                return;
            }

            axios.get('/products/search', {
                    params: {
                        search: query
                    }
                })
                .then(response => {
                    const products = response.data;
                    const tableBody = document.getElementById('product-list');
                    tableBody.innerHTML = '';

                    if (products.length === 0) {
                        document.getElementById('no-results').style.display = 'block';
                    } else {
                        document.getElementById('no-results').style.display = 'none';
                        products.forEach(product => {
                            const row = `<tr>
                                <td>${product.id}</td>
                                <td>${product.product_number}</td>
                                <td>${product.location_number}</td>
                            </tr>`;
                            tableBody.innerHTML += row;
                        });
                    }
                })
                .catch(error => {
                    console.error('検索エラー:', error);
                });
        }
    </script>

</body>

</html>