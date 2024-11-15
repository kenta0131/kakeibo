<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TAmountModel extends Model
{
    protected $table = 't_amount';

    public function category()
    {
        return $this->belongsTo(DashboardModel::class, 'category_id', 'category_id');
    }
}
