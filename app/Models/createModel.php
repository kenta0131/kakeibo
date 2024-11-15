<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class createModel extends Model
{
    use HasFactory;

    protected $table = 't_amount';

    public function create($request)
    {
        $editType = $request->input('editType');
        $editAmount = $request->input('editAmount');
        $editDescription = $request->input('editDescription');

        $income_and_expence_id = $this->search($editType);

        DB::table('t_amount')->insert([
            'income_and_expence_id' => $income_and_expence_id,
            'category_id' => $editType,
            'amount' => $editAmount,
            'description' => $editDescription,
            'create_date' => date("Ymd")
        ]);
    }

    public function search($editType)
    {
        return DB::table('m_category')
        ->where('category_id', $editType)
        ->value('income_and_expence_id');
    }

    public function create2($request)
    {

    }
    
}
