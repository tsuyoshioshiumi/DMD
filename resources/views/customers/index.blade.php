<x-app-layout>
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>お客様一覧</title>
    </head>

    <body>

        <h1>お客様一覧</h1>

        @if ($cities->isEmpty())
            <p>登録された都市はありません。</p>
        @else
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>都市名</th>
                    <th>登録ユーザーID</th>
                </tr>
                @foreach ($cities as $city)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->city_name }}</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        @endif

        <br>
        <a href="{{ route('cities.create') }}">都市を登録する</a>

    </body>

    </html>
