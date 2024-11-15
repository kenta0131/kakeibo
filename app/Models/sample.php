<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sample extends Model
{
    use HasFactory;
    
    public function getData()
    {
        return '名前：'.$this -> name.'---メール：'.$this -> email;
    }
}
