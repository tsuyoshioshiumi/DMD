<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * 顧客一覧を表示
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * 顧客登録フォームを表示
     */
    public function create()
    {
        return view('customers.create'); // `user_id` を渡さずにビューを表示
    }

    /**
     * 顧客情報を保存
     */
    public function store(Request $request)
    {
        // バリデーションチェック
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'city_id' => 'required|exists:cities,id', // `city_id` を追加
    ]);

    // データを保存
    Customer::create([
        'name' => $request->name,
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'city_id' => $request->city_id, // `city_id` を追加
    ]);

    return redirect()->route('customers.index')->with('success', 'お客様情報が登録されました！');
    }
}
