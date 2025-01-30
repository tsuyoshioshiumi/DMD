<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お客様一覧</title>
</head>
<body>

    <h1>お客様一覧</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if ($customers->isEmpty())
        <p>登録されたお客様はいません。</p>
    @else
        <table border="1">
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>住所</th>
                <th>連絡先</th>
            </tr>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->phone_number }}</td>
                </tr>
            @endforeach
        </table>
    @endif

    <br>
    <a href="{{ route('customers.create') }}">お客様を登録する</a>

</body>
</html>
