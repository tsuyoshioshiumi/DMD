<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\User; // Userモデルを追加

class CityController extends Controller
{
    /**
     * 都市情報の一覧を表示
     */
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    /**
     * 都市情報の登録フォームを表示
     */
    public function create()
    {
        $users = User::all(); // `users` テーブルから全てのデータを取得
        return view('cities.create', compact('users')); // `$users` をビューに渡す
    }

    /**
     * 都市情報を保存
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'city_name' => 'required|string|max:255',
        ]);

        // データを保存
        City::create([
            'user_id' => $request->user_id,
            'city_name' => $request->city_name,
        ]);

        return redirect()->route('cities.index')->with('success', '都市情報が登録されました！');
    }
    /**
     * 編集画面を表示
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $users = User::all(); // ユーザー一覧も取得
        return view('cities.edit', compact('city', 'users'));
    }

    /**
     * 都市情報を更新
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'city_name' => 'required|string|max:255',
        ]);

        $city = City::findOrFail($id);
        $city->update([
            'user_id' => $request->user_id,
            'city_name' => $request->city_name,
        ]);
        return redirect()->route('cities.index')->with('success', '都市情報が更新されました！');
    }

    /**
     * 都市情報を削除
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id); // 指定された ID の都市を取得
        $city->delete(); // 削除実行

        return redirect()->route('cities.index')->with('success', '都市情報が削除されました！');
    }
}
