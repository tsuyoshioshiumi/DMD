<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お客様登録</title>
</head>

<body>

    <h1>お客様登録</h1>

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
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf <!-- CSRFトークンを埋め込む -->
        {{-- <!-- 市を選択 -->
        <label for="city_id">市:</label>
        <select name="city_id" id="city_id">
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
        <br><br> --}}

        <!-- お客様の名前 -->
        <label for="name">名前:</label>
        <input type="text" name="name" id="name" required>
        <br><br>

        <!-- 住所 -->
        <label for="address">住所:</label>
        <input type="text" name="address" id="address" required>
        <br><br>

        <!-- 連絡先 -->
        <label for="phone_number">連絡先:</label>
        <input type="text" name="phone_number" id="phone_number" required>
        <br><br>

        <!-- 登録ボタン -->
        <button type="submit">お客様情報を登録</button>
    </form>

</body>

</html>
