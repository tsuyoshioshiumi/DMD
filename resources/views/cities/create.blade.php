<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>都市情報の登録</title>
</head>
<body>

    <h1>都市情報の入力</h1>

    <!-- エラーメッセージの表示 -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- フォームの開始 -->
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf <!-- CSRFトークンを埋め込む -->
        
        <!-- ユーザー選択 -->
        <label for="user_id">ユーザー:</label>
        <select name="user_id" id="user_id">
            @foreach ($users as $user) <!-- ユーザー一覧を表示 -->
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <br><br>

        <!-- 都市名 -->
        <label for="city_name">都市名:</label>
        <input type="text" name="city_name" id="city_name" required>
        <br><br>

        <!-- 登録ボタン -->
        <button type="submit">都市情報を登録</button>
    </form>

</body>
</html>
