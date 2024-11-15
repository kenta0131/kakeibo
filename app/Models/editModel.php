<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditModel extends Model
{
    // タイムスタンプのカラム名を指定
    const UPDATED_AT = 'update_date';
    public $timestamps = true;
    
    // テーブル名の指定
    protected $table = 't_amount'; // 必要に応じて正しいテーブル名を指定

    // プライマリキーの指定
    protected $primaryKey = 'id'; 

    // 更新可能なカラムを指定
    protected $fillable = ['category_name', 'amount'];
}