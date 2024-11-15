<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCategory extends Model
{
    use HasFactory;

    // テーブル名の指定
    protected $table = 'm_category'; // m_categoryテーブルを指定

    // プライマリキーが 'id' でない場合は指定
    protected $primaryKey = 'category_id';

    // 更新可能なカラム
    protected $fillable = ['category_name'];
}
