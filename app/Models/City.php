<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city_name']; // user_id を追加

    // ユーザー情報を取得するリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

