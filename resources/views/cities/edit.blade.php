<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>都市情報の編集</title>
</head>
<body>

    <h1>都市情報の編集</h1>

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

    <!-- フォームの開始 -->
    <form action="{{ route('cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Laravel で更新を行うために `PUT` メソッドを指定 -->

        <!-- ユーザー選択 -->
        <label for="user_id">ユーザー:</label>
        <select name="user_id" id="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $city->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <!-- 都市名 -->
        <label for="city_name">都市名:</label>
        <input type="text" name="city_name" id="city_name" value="{{ $city->city_name }}" required>
        <br><br>

        <!-- 更新ボタン -->
        <button type="submit">更新</button>
    </form>

    <br>
    <a href="{{ route('cities.index') }}">一覧に戻る</a>

</body>
</html>
