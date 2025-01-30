<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;

class CityControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // `cities` テーブルから全てのデータを取得
        $cities = City::all();
        $users = User::all(); // ユーザーのデータを全て取得

        // ビューにデータを渡す
        return view('cities.index', compact(['cities','users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // ユーザーのデータを全て取得
        return view('cities.create', compact('users')); // ビューに渡す
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション（必須チェック）
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'city_name' => 'required|string|max:255',
        ]);

        // データを保存
        City::create([
            'user_id' => $request->user_id,
            'city_name' => $request->city_name,
        ]);

        // 成功時のリダイレクト
        return redirect()->back()->with('success', '都市情報が登録されました！');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
