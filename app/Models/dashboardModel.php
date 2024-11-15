<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\MCategory;

class DashboardModel extends Model
{
    use HasFactory;

        // t_amount テーブルと関連付ける
        public function amounts()
        {
            return $this->hasMany(TAmountModel::class, 'category_id', 'category_id');
        }

    // テーブル名を指定
    protected $table = 't_amount'; // t_amountテーブルに修正

    // プライマリキーの指定（必要に応じて
    protected $primaryKey = 'id'; 

    // 更新可能なカラムを指定
    protected $fillable = ['category_id', 'amount']; // カテゴリIDも追加

    public function categories()
    {
        return $this->belongsTo(MCategory::class, 'category_id'); // m_categoryモデルとのリレーション
    }

    public static function getDashboardData()
    {
        return self::with('categories')
            ->select('t_amount.id', 't_amount.amount', 'category_id')
            ->get()
            ->map(function ($item) {
                // m_categoryの名前を取得して、新しいプロパティを追加
                $item->category_name = $item->categories->category_name ?? '';
                return $item;
            });
    }
}
