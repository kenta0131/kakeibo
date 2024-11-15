<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dashboardModel;
use Illuminate\Support\Facades\DB;

class dashboardController
{
    public function index()
    {

        
        // カテゴリに関連する支出と収入を取得
        $dashboards = DashboardModel::with('amounts')->get();

        // 総収入の計算
        $totalIncome = DB::table('t_amount')
            ->join('m_category', 't_amount.category_id', '=', 'm_category.category_id')
            ->whereIn('m_category.category_name', ['給料', '雑収入'])
            ->sum('t_amount.amount');

        // 総支出の計算
        $totalExpence = DB::table('t_amount')
            ->join('m_category', 't_amount.category_id', '=', 'm_category.category_id')
            ->whereIn('m_category.category_name', ['食費', '外食費', '生活用品', '車ローン', '家賃・住宅ローン', '電気代', 'ガス代', '水道代', '通信費', '医療費', '保険代', '国民健康保険', '市民税', '固定資産税', '繰越残高', '雑費・その他'])
            ->sum('t_amount.amount');

        // 収支合計を計算
        $balance = $totalIncome - $totalExpence;

        // データをビューに渡す
        return view('dashboard')->with([
            'dashboards' => $dashboards,
            'totalIncome' => $totalIncome,
            'totalExpence' => $totalExpence,
            'balance' => $balance, 
        
        ]);
    }


    public function destroy($id)
    {
        // t_amount テーブルから指定された id のレコードを削除
        DB::table('t_amount')->where('id', $id)->delete();

        // 削除後、ダッシュボードにリダイレクト
        return redirect('/dashboard')->with('message', '項目が削除されました');
    }

    public function edit($id)
    {
        //取得したidをもとにamount、category_name持ってくる
        //editページ、editのcontroller.Modelを作成

        // 編集する項目を取得
        $record = DB::table('t_amount')
        ->join('m_category', 't_amount.category_id', '=', 'm_category.category_id')
        ->select('t_amount.*', 'm_category.category_name')
        ->where('t_amount.id', $id)
        ->first(); // ここでfirst()を使って1つのレコードを取得する

        // 編集用フォームにレコードのデータを渡す
        return view('edit', compact('record'));
    }

}
