<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>都市一覧</title>
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: blue;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>

    <h1>都市一覧</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if ($cities->isEmpty())
        <p>登録された都市はありません。</p>
    @else
        <table border="1">
            <tr>
                <th>ID</th>
                <th>都市名</th>
                <th>登録ユーザー</th>
                <th>編集</th> <!-- 編集ボタン追加 -->
                <th>削除</th>
            </tr>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->city_name }}</td>
                    <td>{{ $city->user->name ?? '不明' }}</td>
                    <td>
                        <a href="{{ route('cities.edit', $city->id) }}" style="color: blue;">編集</a> <!-- 編集ボタン -->
                    </td>
                    <td>
                        <form action="{{ route('cities.destroy', $city->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red;">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <br>
    <!-- 「都市を登録する」をボタンに変更 -->
    <a href="{{ route('cities.create') }}" class="button">都市を登録する</a>

</body>
</html>
